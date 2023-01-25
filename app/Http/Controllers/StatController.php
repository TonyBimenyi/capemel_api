<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;

class StatController extends Controller
{
    //
    public function district_count()
    {
    	# code...
    	$districts = District::count();
    	return $districts;
    }
}
