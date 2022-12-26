<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paroisse;
use Illuminate\Support\Facades\Validator;


class ParoisseController extends Controller
{
    //
    public function store(Request $request)
    {
        // code...
         $validator = Validator::make($request->all(),[
            'nom_paroisse' => 'required',
            'id_district' => 'required',
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
        $paroisse = Paroisse::create($input);
            
          $response = [
            'success'=>true,
            'data'=>$paroisse,
            'message'=>"Paroisse register successfully"
        ];

    return response()->json($response,200); 
    }

    public function show()
    {
        // code...
        $paroisses = Paroisse::with('district')->get();

        return $paroisses;
    }
      public function update(Request $request,$id)
    {
        // code...
         $updateP = Paroisse::findOrFail($id);
         $input = $request->all();  
         $updateP->fill($input)->update();
    }
}
