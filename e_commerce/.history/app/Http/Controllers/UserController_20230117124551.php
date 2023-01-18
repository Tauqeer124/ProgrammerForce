<?php

namespace App\Http\Controllers;

use App\Mail\verify;
use App\Models\User;
use App\Mail\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
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
    if ($user) {
        $verify2 =  DB::table('password_resets')->where([
            ['email', $request->all()['email']]
        ]);

        if ($verify2->exists()) {
            $verify2->delete();
        }
        $pin = rand(100000, 999999);
        DB::table('password_resets')
            ->insert(
                [
                    'email' => $request->all()['email'], 
                    'token' => $pin
                ]
            );
    }
    Mail::to($request->email)->send(new VerifyEmail($pin));
    $token = $user->createToken('myapptoken')->accessToken;
    return new JsonResponse(
        [
            'success' => true, 
            'message' => 'Successful created user. Please check your email for a 6-digit pin to verify your email.', 
            'token' => $token
        ], 
        201
    );
}

public function verifyEmail(Request $request)
{
    $validator = Validator::make($request->all(), [
        'token' => ['required'],
    ]);
    if ($validator->fails()) {
        return redirect()->back()->with(['message' => $validator->errors()]);
    }
    $select = DB::table('password_resets')
        ->where('email', Auth::user()->email)
        ->where('token', $request->token);
    if ($select->get()->isEmpty()) {
        return new JsonResponse(['success' => false, 'message' => "Invalid PIN"], 400);
    }
    $select = DB::table('password_resets')
        ->where('email', Auth::user()->email)
        ->where('token', $request->token)
        ->delete();
    $user = User::find(Auth::user()->id);
    $user->email_verified_at = Carbon::now()->getTimestamp();
    $user->save();
    return new JsonResponse(['success' => true, 'message' => "Email is verified"], 200);
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
    public function updatepassword(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'oldPassword' => 'required',
            'password' => 'required|confirmed'
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
            $Password = Auth::user()->password;
        if (Hash::check($input['oldPassword'], $Password)) {
            $user = User::Find(Auth::id());
            $user->password = Hash::make($input['password']);
            $user->save();
            $response = ['message' => 'password has been updated!'];
            return response($response, 200);
            Auth::logout();
        }
    }
    
}
