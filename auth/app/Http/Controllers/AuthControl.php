<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


use App\Models\User;
use Dotenv\Validator as DotenvValidator;
use Illuminate\Support\Facades\Redis;
use Validator;

class AuthControl extends Controller
{   
    public function register(Request $request){
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

        $responseArray = [];
        $responseArray['token'] = $user->createToken('MyApp')->accessToken;
        $responseArray['name'] = $user->name;

        return response()->json( $responseArray,200);
   
    }

    public function login(Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            $user = Auth::user();
            $responseArray = [];
            $responseArray['token'] = $user->createToken('MyApp')->accessToken;
            $responseArray['name'] = $user->name;
    
            return response()->json( $responseArray,200);
        }else{
            return response()->json( ['errors'=> 'Unauthicated'],203);
        }
    }


    public function userfunction(){

        $data =  User::all();
        $responseArray = [
            'status'=>'ok',
            'data'=>$data
        ];

        return response()->json($responseArray,200);
        // return view('welcome', ['users' => $users]);
  
    }
}
