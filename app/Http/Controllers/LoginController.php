<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    //

    public function login(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->plainTextToken; 
            $success['user'] =  $user;
            return $this->sendResponse($success, 'User login successfully.');
        }
        else{ 
            return $this->sendError('Vérfier vos identifiant.', ['error'=>'Unauthorised']);
        } 
    }
}
