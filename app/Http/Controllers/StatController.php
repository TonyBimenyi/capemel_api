<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Paroisse;
use App\Models\Membre;
use App\Models\Pension;
use App\Models\Cotisation;
use App\Models\Conference;
use App\Models\Categorie;
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
     public function conference_count()
    {
        # code...
        $districts = Conference::count();
        return $districts;
    }
     public function categorie_count()
    {
        # code...
        $districts = Categorie::count();
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
    public function cotisation_total_non_paye()
    {
    	# code...
         $cot_total_a_paye = DB::table('cotisations')
        ->select(DB::raw('sum(montant_a_paye) as "cotisation_total"'))
        ->get();
        return $cot_total_a_paye;
    }
    public function recent_cot()
    {
    	# code...
    	$recent_cot = Cotisation::with(['membre'
            ,'membre.categorie'
    ])
    	->orderBy('id','desc')
    	->take(10)
    	->get();
    	return $recent_cot;
    }
    public function top_cot()
    {
    	# code...
    	 // $cotisations = DB::table('cotisations','districts')
      //   ->select('districts.nom_district',DB::raw('sum(cotisations.montant_a_paye) as "cotisation_total"'))
      //   ->groupBy('districts.id')
      //   ->get();
    	$cotisations = Cotisation::
    	join('districts','cotisations.id_district','=','districts.id')
    	->select('districts.id','districts.nom_district',DB::raw('sum(cotisations.montant_a_paye) as "cotisation_total"'))
    	->groupBy('districts.id','districts.nom_district')
    	->orderBy('cotisations.montant_paye','desc')
    	->get();
        return $cotisations;
    }
}
