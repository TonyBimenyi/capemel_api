<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\conjoint;

class ConjointController extends Controller
{
    public function show($id)
    {
        // code...
        $conjoint = Conjoint::
        where('matricule_membre','=',$id)
        ->get();
        return $conjoint;
    }
}
