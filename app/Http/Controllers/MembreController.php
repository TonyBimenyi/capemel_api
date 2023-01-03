<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Membre;

class MembreController extends Controller
{
    //
     public function store(Request $request)
    {
        # code...
        $date = Carbon::now()->format('Y');
        $count = Membre::count()+1;
        // $file = $request->file('photo_membre');
        // $ext = $file->getClientOriginalExtension();
        // $filename = time().'.'.$ext;
        // $file->move('assets/uploads/',$filename);

        $request->validate([
            
            'nom_membre'=>'required',
            'id_categorie'=>'required',
            'id_paroisse'=>'required',
        ],
        [
            'nom_membre.required'=>'Le nom du membre est obligatoire',
            'id_categorie.required'=>'La categorie est obligatoire',
            'id_paroisse.required'=>'La Paroisse est obligatoire',
        ]);
        $membre = new Membre([
            'matricule_membre'=>'CAPEMEL-'.$date.'/0'.$count,
            'nom_membre'=>$request->get('nom_membre'),
            'prenom_membre'=>$request->get('prenom_membre'),
            'nom_pere_membre'=>$request->get('nom_pere_membre'),
            'nom_mere_membre'=>$request->get('nom_mere_membre'),
            'date_naissance_membre'=>$request->get('date_naissance_membre'),
            'colline_membre'=>$request->get('colline_membre'),
            'commune_membre'=>$request->get('commune_membre'),
            'province_membre'=>$request->get('province_membre'),
            'cin_membre'=>$request->get('cin_membre'),
            'debut_ministere_membre'=>$request->get('debut_ministere_membre'),
            'debut_cotisation_membre'=>null,
            'date_mariage'=>$request->get('date_mariage'),
            'telephone_membre'=>$request->get('telephone_membre'),
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
