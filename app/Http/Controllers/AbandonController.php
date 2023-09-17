<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Abandon;
use App\Models\Membre;

class AbandonController extends Controller
{
    //
    public function store(Request $request)
    {
    	# code...
    	$request->validate([         
            'type_abandon'=>'required',
            'matricule_membre'=>'unique:abandons',
        ],
        [
            'matricule_membre.unique'=>'Le membre est deja en pension ',
        ]);
        $input = $request->all();
        $abandon = Abandon::create($input);
            

        $membre = new Membre([
           $statut=$request->get('type_abandon'),
           $matricule_membre=$request->get('matricule_membre'),
        ]);
		$membre = Membre::where('matricule_membre','=',$matricule_membre)->first();
        $membre->statut = $statut;
        $membre->update();

          $response = [
            'success'=>true,
            'data'=>$abandon,
            'message'=>"Paroisse register successfully"
        ];

    // return response()->json($response,200); 

    }
    public function show(Abandon $aba)
    {
        # code...
        // $abandons = Abandon::with(relations:'membre')->get();
        // return $abandons;
         $district_select = \Request::get('district_select');
        $id_paroisse = \Request::get('id_paroisse');
        $date_debut = \Request::get('date_debut');
        $date_fin = \Request::get('date_fin');
        $abandons = $aba::with(['membre'
            ,'membre.paroisse',
            'membre.paroisse.district'
    ])
        // ->join('membres','membres.matricule_membre','=','abandons.matricule_membre')
        // ->join('paroisses','membres.id_paroisse','=','paroisses.id')
        // ->join('districts','paroisses.id_district','=','districts.id')
        //  ->where(function($query) use($district_select,$id_paroisse,$date_debut,$date_fin){
        //     if($district_select){

        //         $query->where('paroisses.id_district', '=',$district_select);
        //     }
        //      if($id_paroisse){

        //         $query->where('membres.id_paroisse', '=',$id_paroisse);
        //     }
        //     if($date_debut){

        //         $query->whereDate('abandons.created_at_abandon', '>=',$date_debut);
        //     }
        //     if($date_fin){

        //         $query->whereDate('abandons.created_at_abandon', '<=',$date_fin);
        //     }
        // })
          ->orderBy('abandons.id','DESC')
        ->get();
        return $abandons;
    }
    public function restaurer(Request $request,$id)
    {
        # code...
     $membre = new Membre([
               $statut='actif',
               $matricule_membre=$request->get('matricule_membre'),
            ]);
            $membre = Membre::where('matricule_membre','=',$matricule_membre)->first();
            $membre->statut = $statut;
            $membre->update();
    $deleteD = Abandon::findOrFail($id);
    $deleteD->delete();
    }

        // code...
        
    
}
