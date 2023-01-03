<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller
{
    public function show()
    {
        // code...
        $categories = Categorie::all();
        return  $categories;
    }
}
