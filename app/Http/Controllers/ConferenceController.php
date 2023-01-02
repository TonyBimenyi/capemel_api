<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conference;

class ConferenceController extends Controller
{
    //
    public function show()
    {
        // code...
        $conferences = Conference::all();
        return  $conferences;
    }
    public function store(Request $request)
    {
        // code...
        
    }
}
