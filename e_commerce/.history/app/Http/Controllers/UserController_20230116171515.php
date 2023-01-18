<?php

namespace App\Http\Controllers;

use App\Mail\verify;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function validateuser(Request $request ){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'role'=>'required'
        ]);
        return $validator;


    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $res=$this->validateuser($request);
        if($res->fails()){
            return response()->json($res->errors(),202);
        }
         $input = $request->all();
         $input['password'] = Hash::make($input['password']);
         $user = User::create($input);
         $token = $user->createToken('Token')->accessToken;
         if($user){
            Mail::to($user->email)->send(new verify($user));
         }
         return response()->json(['Message'=>"new user has been added and mail sent", 'user' => $user, 'token' => $token, ]);
     }
     public function verify(){
        return view('mails.welcome');
    }
     public function email_verified($email){
        $user=User::where('email',$email)->get();
        if(count($user)>0){
        $user=User::find($user[0]['id']);
        $datetime=Carbon::now()->timezone('Asia/Karachi');
        $user->email_verified_at=$datetime;
            $user->save();
            echo "Email Verified";
    }

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id); 
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->role=$request->role;
        $user->save();
        $response = ['message' => 'user has been updated!'];
        return response($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->destroy();
        $response = ['message' => 'user has been deleted!'];
        return response($response, 200);
    }
    
    public function login (Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                $response = ['token' => $token];
                return response($response, 200);
            } else {
                $response = ["message" => "Password mismatch"];
                return response($response, 422);
            }
        } else {
            $response = ["message" =>'Email does not exist'];
            return response($response, 422);
        }
    }
    public function logout (Request $request) {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }
    public function update(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'oldPassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
            return response()->json([
                "success" => false,
                "message" => "Validation Failed.",
                "body"=>$validator->errors(),
            ]);
        }

        $Password = Auth::user()->password;
        if (Hash::check($input['oldPassword'], $Password)) {
            $user = User::Find(Auth::id());
            $user->password = Hash::make($input['password']);
            $user->save();
            return response()->json([
                "success" => true,
                "message" => "Password Updated successfully."
            ]);
            Auth::logout();
        }
    }
    
}
