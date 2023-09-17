<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conference;
use Illuminate\Support\Facades\Validator;

class ConferenceController extends Controller
{
    //
    public function show()
    {
        // code...
        $conferences = Conference::all();
        return  $conferences;
    }
    public function store(Request $request)
    {
        // code...
         $request->validate([
            'nom_conference' => 'unique:conferences|required',
   
        ],
        [
            'nom_conference.required'=>'Le nom de la conference est obligatoire',
            'nom_conference.unique'=>'Le nom de la conference est deja enregistre',
        ]

    );
        
        $input = $request->all();
        $conference = Conference::create($input);
            
          $response = [
            'success'=>true,
            'data'=>$conference,
            'message'=>"User register successfully"
        ];

    return response()->json($response,200);  
        
    }
     public function update(Request $request,$id)
    {
        // code...
         $updateD = Conference::findOrFail($id);
         $input = $request->all();  
         $updateD->fill($input)->update();
    }
    public function delete(Request $request,$id)
    {
        // code...
         $deleteD = Conference::findOrFail($id);
         $deleteD->delete();
    }
}
