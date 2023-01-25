<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Paroisse;

class StatController extends Controller
{
    //
    public function district_count()
    {
    	# code...
    	$districts = District::count();
    	return $districts;
    }

    public function paroisse_count()
    {
    	# code...
    	$paroisses = Paroisse::count();
    	return $paroisses;
    }
}
