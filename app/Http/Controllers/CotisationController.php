<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;
use App\Models\Cotisation;
use App\Models\Membre;
use Illuminate\Support\Facades\Validator;
use DB;

class CotisationController extends Controller
{
    //
     public function store(Request $request)
    {
        // code...
        $request->validate([         
            'montant_paye'=>'required',
           //  'trimestre'=>'unique:cotisations,matricule_membre|required',
           // 'matricule_membre'
        ],
        [
            'montant_paye.required'=>'Le montant_total est obligatoire',
            // 'prenom_conjoint.required'=>'Le prenom du conjoint est obligatoire',
            // 'id_paroisse.required'=>'La Paroisse est obligatoire',
            // 'matricule_membre.matricule_membre.unique'=>'Chaque membre doit avoir un(e) conjoint(e)'
        ]);
        $input = $request->all();
        $cotisation = Cotisation::create($input);
            
          $response = [
            'success'=>true,
            'data'=>$cotisation,
            'message'=>"Paroisse register successfully"
        ];

    return response()->json($response,200); 

       //  $montant_paye = $request->get('montant_paye');
       //  $cotisations = $request->get('cotis');
       //  $annee = $request->get('annee');
       //  $trimestre = $request->get('trimestre');
       //  $montant_a_paye = $request->get('montant_a_paye');
       //  $id_uti = $request->get('id_uti');
        
       //  foreach ($montant_paye as $k) {
       //              # code...
       //              $k;
       //  }

       // foreach ($cotisations as $cot) {
       //      # code...
       //      Cotisation::create([
       //          'montant_paye'=> $k,
       //          'montant_a_paye' => 25000,
       //          'trimestre' => $trimestre,
       //          'annee' => $annee,
       //          'matricule_membre' => $cot['matricule_membre'],
       //          'id_uti' => $id_uti,
       //      ]);

       //  }
    }
    public function show()
    {
        // code...
        $cotisations = Cotisation::with('membre')
        ->orderBy('id','DESC')
        ->get();
        return $cotisations;
    }
    public function update(Request $request,$id)
    {
        # code...
        $montant_a_paye = $request->get('montant_paye');
        $updateCot=DB::table('cotisations')
        ->where('id',$id)
        ->update(['montant_paye'=>$montant_a_paye]);          
          $response = [
            'success'=>true,
            'data'=>$updateCot,
            'message'=>"Paroisse register successfully"
        ];

    return response()->json($response,200); 
    }
      public function membreCot()
    {
        # code...
         $membre_cotisation = Membre::with('categorie','user','paroisse')
        ->where('statut','=','actif')
        ->get();
        return $membre_cotisation;
    }
    public function delete($id)
    {
      # code...
      $deleteCot = Cotisation::findOrFail($id);
      $deleteCot->delete();
    }
}
