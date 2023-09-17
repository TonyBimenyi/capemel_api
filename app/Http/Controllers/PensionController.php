<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pension;
use App\Models\Membre;

class PensionController extends Controller
{
    //
     public function store(Request $request)
    {
    	# code...
    	$request->validate([         
            'motif_pension'=>'required',
            'matricule_membre'=>'unique:pensions',
        ],
        [
            'matricule_membre.unique'=>'Le membre est deja en pension ',
        ]);

        $input = $request->all();
        $pension = Pension::create($input);

        $membre = new Membre([
           $statut='pensionne',
           $matricule_membre=$request->get('matricule_membre'),
        ]);
		$membre = Membre::where('matricule_membre','=',$matricule_membre)->first();
        $membre->statut = $statut;
        $membre->update();

          $response = [
            'success'=>true,
            'data'=>$pension,
            'message'=>"Paroisse register successfully"
        ];

    // return response()->json($response,200); 

    }
    public function show()
    {
        # code...
          $district_select = \Request::get('district_select');
        $id_paroisse = \Request::get('id_paroisse');
        $date_debut = \Request::get('date_debut');
        $date_fin = \Request::get('date_fin');
        $pensions = Pension::with([
            'membre',
            'membre.categorie',
            'membre.paroisse',
            'membre.paroisse.district',
        ])
         ->join('membres','membres.matricule_membre','=','pensions.matricule_membre')
        ->join('paroisses','membres.id_paroisse','=','paroisses.id')
        ->join('districts','paroisses.id_district','=','districts.id')
         ->where(function($query) use($district_select,$id_paroisse,$date_debut,$date_fin){
            if($district_select){

                $query->where('paroisses.id_district', '=',$district_select);
            }
             if($id_paroisse){

                $query->where('membres.id_paroisse', '=',$id_paroisse);
            }
            if($date_debut){

                $query->whereDate('pensions.created_at_pension', '>=',$date_debut);
            }
            if($date_fin){

                $query->whereDate('pensions.created_at_pension', '<=',$date_fin);
            }
        })
         ->orderBy('pensions.id','DESC')
        ->get();

        return $pensions;
    }
}
