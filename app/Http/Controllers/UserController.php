<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function show()
    {
        // code...
        $users = User::all();
        return  $users;
    }
    public function store(Request $request)
    {
        // code...
        $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'c_password' => 'required',
                'role' => 'roler'
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
            $input['remember_token'] = Str::random(10);
            $user = User::create($input);
            
            $success['name'] =  $user;

            return sendResponse($success, 'User register successfully.');
        

    }
}
