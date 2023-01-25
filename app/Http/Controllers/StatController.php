<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Paroisse;
use App\Models\Membre;
use App\Models\Pension;
use DB;

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
     public function membre_count()
    {
    	# code...
    	$membres = Membre::count();
    	return $membres;
    }
    public function pension_count()
    {
    	# code...
    	$pensions = Pension::count();
    	return $pensions;
    }
    public function cotisation_total()
    {
    	# code...
    	 $cot_total = DB::table('cotisations')
        ->select(DB::raw('sum(montant_paye) as "cotisation_total"'))
        ->get();
        return $cot_total;
    }
}
