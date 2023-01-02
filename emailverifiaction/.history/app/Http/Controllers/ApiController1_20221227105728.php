<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController1 extends Controller
{
    public function register_user(Request $request){
        public function registerrrr(Request $request){ 

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
    
            // $responseArray = [];
            // $responseArray['token'] = $user->createToken('MyApp')->accessToken;
            // $responseArray['name'] = $user->name;
    
            // return response()->json($responseArray,200);  
        }
    }
}
