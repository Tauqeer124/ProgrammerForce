<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApiController1 extends Controller
{
    public function register_user(Request $request){
        

            $validator = Validator::make($request->all(),[
                'name'=>'required',
                'email'=>'required|email',
                'password'=>'required',
                'c_password'=>'required|same:password'
            ]);
    
            if($validator->fails()){
                return response()->json($validator->errors(),202);
            }
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
    
            $user = User::create($input);
            $token = $user->createToken('Token')->accessToken;
    
            return response()->json([ 'user' => $user, 'token' => $token]);
    
        }
        //login
        public function login(Request $request){ 
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                $user =Auth::user();
                $responseArray['token'] = $user->createToken('MyApp')->accessToken;
                $responseArray['name'] = $user->name;
    
                return response()->json($responseArray,200);
    
            }else{
                return response()->json(['error'=>'Unauthenticated'],203);
            }
        }
        public function getTaskList(){
            $data =  user::all();
            $responseArray = [
                'status'=>'ok',
                'data'=>$data
            ]; 
            return response()->json($responseArray,200);
        }
        public function logout(Request $request){
        
            $token = $request->user()->token();
            $token->revoke();
            $response = ['message' => 'You have been successfully logged out!'];
            return response($response, 200);
        
    }
    public function sendverifyemail($email){
    if(auth()->user()){
        $user=User::where('email',$email)->get();
        if(count($user)>0){
            $random=Str::random(40);
            $domain=URL::to('/');
            $url=$domain.'/'.$random;
            $data['url']=$url;

            $data['email']=$email;
            $data['title']="Email Verification";
            $data['body']="Please verify your email";
            Mail::send('verifyEmail',['data'=>$data],function($message)use ($data){
                $message->to($data['email'])->subject($data['title']);
            });
            $user=User::find($user[0]['id']);
            $user->remember_token=$random;
            $user->save();
            return response()->json(["message"=>"mail sent"]);
        }else{
            return response()->json(["message"=>"user is not found"]);
        }
    }else{
        return response()->json(["message"=>"user is not authenticated"]);
    }
}
}