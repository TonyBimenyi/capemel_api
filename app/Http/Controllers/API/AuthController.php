<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        // code...
        //validator...
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'role' =>'required',
            'telephone' => 'required',
        ]);

        if($validator->fails()){
            #code...
            $response = [
                'success' => false,
                'message' => $validator->errors(),

            ];
            return response()->json($response, 400);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;
        $success['telephone'] = $user->telephone;
        $success['role'] = $user->role;

        $response = [
            'success'=>true,
            'data'=>$success,
            'message'=>"User register successfully"
        ];

        return response()->json($response,200);
    }

    public function login(Request $request)
    {
        // code...
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            $user = Auth::user();
            // $user = $request->user();
             $success['user'] = $user;
             $success['name'] = $user->name;
             $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $response = [
                'success'=>true,
                'data'=>$success,
                'message'=>"User Login successfully"
            ];

             return response()->json($response,200);
             }
        else{
             $response = [
                'success'=>false,
               
                'message'=>"Verifier vos identifiants!"
            ];

             return response()->json($response,400);
        }
    }
    public function me(Request $request)
    {
        // code...
        return response()->json(Auth::user());
    }

}
