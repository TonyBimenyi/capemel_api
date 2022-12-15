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
}
