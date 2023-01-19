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
           $statut='Abandon',
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
    public function show()
    {
        # code...
        $abandons = Abandon::get();
        return $abandons;
    }
}
