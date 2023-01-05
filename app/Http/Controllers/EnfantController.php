<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enfant;

class EnfantController extends Controller
{
    //
     public function show($id)
    {
        // code...
        $conjoint = Enfant::
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
            
            'nom_enfant'=>'required',
            'prenom_enfant'=>'required',
        ],
        [
            'nom_conjoint.required'=>'Le nom du conjoint est obligatoire',
            'prenom_conjoint.required'=>'Le prenom du conjoint est obligatoire',
        ]);
        $enfant = new Enfant([     
            'nom_enfant'=>$request->get('nom_enfant'),
            'prenom_enfant'=>$request->get('prenom_enfant'),
            'date_naissance_enfant'=>$request->get('date_naissance_enfant'),
            'id_uti'=>$request->get('id_uti'),
            'matricule_membre'=>$request->get('matricule_membre'),
        ]);
        $enfant->save();
         $response = [
            'success'=>true,
            'data'=>$enfant,
            'message'=>"Enfant register successfully"
        ];

         return response()->json($response,200); 
    }   
      public function update(Request $request,$id)
    {
        // code...

       $updateE = Enfant::findOrFail($id);
         $input = $request->all();
         $updateE->fill($input)->update();
        $updateE->update();
         $response = [
            'success'=>true,
            'data'=>$updateE,
            'message'=>"Enfant register successfully"
        ];
        return response()->json($response,200);
    }
}
