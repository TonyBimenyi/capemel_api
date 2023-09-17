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
         $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'role' =>'required',
            'telephone' => 'required',
        ],
        [
            'name.required'=>'Le nom  est obligatoire',
            'email.required'=>'Le Nom d utilisateur est obligatoire',
            'email.unique'=>'Le username doit etre unique',
            'password.required'=>'Mot de passe est obligatoire',
            'password.same'=>'Les mot de passe doivent etre identique',
            'role.required'=>'Le role  est obligatoire',

        ]);

       
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
      public function update(Request $request,$id)
    {
        // code...
         $input = $request->all();
     
         $updateD = User::findOrFail($id);
         $input = $request->all(); 
         $input['password'] = bcrypt($input['password']); 
         $updateD->fill($input)->update();
    }
    public function me(Request $request)
    {
        // code...
        return response()->json(Auth::user());
    }
    public function delete($id)
     {
        // code...
         $deleteC = User::findOrFail($id);
         $deleteC->delete();
    }

}
