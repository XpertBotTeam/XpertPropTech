<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;


class UserController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(compact('email','password')))
        {
            $user = auth()->user();
            $access_token = $user->createToken('authToken')->plainTextToken;
            return response()->json([
                'status'=> true,
                'message'=> 'Login Successfully',
                'access_token'=> $access_token,
                
            ]);
        }else{
            return response()->json([
                'status'=> false,
                'message'=> 'Invalid Username or Password',
            ]);
        }
    }
        public function register(Request $request)
        {
            $user = new User();
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();

            $access_token = $user->createToken('authToken')->plainTextToken;
            return response()->json([
                'status'=> true,
                'message'=> 'Register Successfully',
                'access_token'=> $access_token,
                
            ]);
        }
        public function Properties($id, Request $request)
        {
            $user = User::find($id);
            if(!is_null($user))
            {
                $properties = $user->properties;
                return response()->json([
                    'status'=>true,
                    'data'=>$properties,
                    'message'=>'Properties of the specific users'

                ]);


            }else{
                return response()->json([
                    'status'=>false,
                    'data'=>null,
                    'message'=>'User not found'
                ]);
            }
        }
}
