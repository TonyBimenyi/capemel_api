<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;
use App\Models\Cotisation;
use Illuminate\Support\Facades\Validator;


class CotisationController extends Controller
{
    //
     public function store(Request $request)
    {
        // code...
        $request->validate([         
            'montant_total'=>'required',
            'trimestre_annee'=>'unique:cotisations,matricule_membre|required',
           'matricule_membre'
        ],
        [
            'montant_total.required'=>'Le montant_total est obligatoire',
            'prenom_conjoint.required'=>'Le prenom du conjoint est obligatoire',
            'id_paroisse.required'=>'La Paroisse est obligatoire',
            'matricule_membre.matricule_membre.unique'=>'Chaque membre doit avoir un(e) conjoint(e)'
        ]);
        $input = $request->all();
        $cotisation = Cotisation::create($input);
            
          $response = [
            'success'=>true,
            'data'=>$cotisation,
            'message'=>"Paroisse register successfully"
        ];

    return response()->json($response,200); 
    }
    public function show()
    {
        // code...
        $cotisations = Cotisation::with('membre')
        ->get();
        return $cotisations;
    }
}
