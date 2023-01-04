<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\conjoint;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ConjointController extends Controller
{
    public function show($id)
    {
        // code...
        $conjoint = Conjoint::
        where('matricule_membre','=',$id)
        ->get();
        return $conjoint;
    }
     public function store(Request $request)
    {
        # code...
        // $file = $request->file('photo_membre');
        // $ext = $file->getClientOriginalExtension();
        // $filename = time().'.'.$ext;
        // $file->move('assets/uploads/',$filename);

        $request->validate([
            
            'nom_conjoint'=>'required',
            'prenom_conjoint'=>'required',
            'id_paroisse'=>'required',
            'matricule_membre'=>'required|unique'
        ],
        [
            'nom_conjoint.required'=>'Le nom du conjoint est obligatoire',
            'prenom_conjoint.required'=>'Le prenom du conjoint est obligatoire',
            'id_paroisse.required'=>'La Paroisse est obligatoire',
            'matricule_membre.unique'=>'Chaque membre doit avoir un(e) conjoint(e)'
        ]);
        $conjoint = new Conjoint([
            $user = Auth::user();
            'nom_conjoint'=>$request->get('nom_conjoint'),
            'prenom_conjoint'=>$request->get('prenom_conjoint'),
            'nom_pere_conjoint'=>$request->get('nom_pere_conjoint'),
            'nom_mere_conjoint'=>$request->get('nom_mere_conjoint'),
            'date_naissance_conjoint'=>$request->get('date_naissance_conjoint'),
            'colline_conjoint'=>$request->get('colline_conjoint'),
            'commune_conjoint'=>$request->get('commune_conjoint'),
            'province_conjoint'=>$request->get('province_conjoint'),
            'nationalite_conjoint'=>$request->get('nationalite_conjoint'),
            'cin_conjoint'=>$request->get('cin_conjoint'),
            'etat_civil_conjoint'=>$request->get('etat_civil_conjoint'),
            'fonction_conjoint'=>$request->get('fonction_conjoint'),,
            'telephone_conjoint'=>$request->get('telephone_conjoint'),
            'photo_conjoint'=>null,
            'id_paroisse'=>$request->get('id_paroisse'),
            'id_uti'=>$user->id,
            'matricule_membre'=>$request->get('matricule_membre'),
        ]);
        $conjoint->save();
         $response = [
            'success'=>true,
            'data'=>$conjoint,
            'message'=>"Paroisse register successfully"
        ];

         return response()->json($response,200); 
    }
}
