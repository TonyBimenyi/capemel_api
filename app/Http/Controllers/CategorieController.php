<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use Illuminate\Support\Facades\Validator;

class CategorieController extends Controller
{
    public function show()
    {
        // code...
        $categories = Categorie::all();
        return  $categories;
    }
    public function store_categorie(Request $request)
    {
    	# code...
    	$validator = Validator::make($request->all(),[
            'nom_categorie' => 'required',
        ]);
        if($validator->fails()){
            #code...
            $response = [
                'success' => false,
                'message' => $validator->errors(),
            ];
            return response()->json($response, 400);
        };
        $input = $request->all();
        $categorie = Categorie::create($input);
            
          $response = [
            'success'=>true,
            'data'=>$categorie,
            'message'=>"User register successfully"
        ];

    return response()->json($response,200);   
    }
     public function update(Request $request,$id)
    {
        // code...
         $updateD = Categorie::findOrFail($id);
         $input = $request->all();  
         $updateD->fill($input)->update();
    }
    public function delete(Request $request,$id)
    {
        // code...
         $deleteD = Categorie::findOrFail($id);
         $deleteD->delete();
    }
}
