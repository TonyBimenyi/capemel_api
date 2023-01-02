<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Membre;

class MembreControlller extends Controller
{
    //
     public function store(Request $request)
    {
        # code...
        $date = Carbon::now()->format('Y');
        $count = Membre::count()+1;

        $request->validate([
            'matricule_membre'=>'required|unique'
            'nom_membre'=>'required',
            'email'=>'unique',
            'cin_membre'=>'unique',
        ]);
        $membre = new Membre([
            'matricule_membre'=>'CAPEMEL-'$date'/0'$count,
            'nom_membre'=>$request->get('nom_membre'),
            'prenom_membre'=>$request->get('prenom_membre'),
            'nom_pere_membre'=>$request->get('nom_pere_membre'),
            'nom_mere_membre'=>$request->get('nom_mere_membre'),
            'date_naissance_membre'=>$request->get('date_naissance_membre'),
            'colline_membre'=>$request->get('colline_membre'),
            'commune_membre'=>$request->get('commune_membre'),
            'cin_membre'=>$request->get('cin_membre'),
            'debut_ministere_membre'=>$request->get('debut_ministere_membre'),
            'debut_cotisation_membre'=>'-',
            'date_mariage'=>$request->get('date_mariage'),
            'telephone_membre'=>$request->get('telephone_membre'),
            'photo_membre'=>$request->get('photo_membre'),
            'statut'=>'actif',
            'id_uti'=>$request->get('id_uti'),
            'id_paroisse'=>$request->get('id_paroisse'),
            'id_categorie'=>$request->get('id_categorie'),
        ]);
        $membre->save();
         $response = [
            'success'=>true,
            'data'=>$membre,
            'message'=>"Paroisse register successfully"
        ];

         return response()->json($response,200); 
    }
}
