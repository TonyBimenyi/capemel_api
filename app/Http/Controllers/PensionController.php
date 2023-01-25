<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pension;

class PensionController extends Controller
{
    //
     public function store(Request $request)
    {
    	# code...
    	$request->validate([         
            'motif_pension'=>'required',
            'matricule_membre'=>'unique:pension',
        ],
        [
            'matricule_membre.unique'=>'Le membre est deja en pension ',
        ]);
        $input = $request->all();
        $abandon = Pension::create($input);
            

        $membre = new Membre([
           $statut='pensionne',
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
}
