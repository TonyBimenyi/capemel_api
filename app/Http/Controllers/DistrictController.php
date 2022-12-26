<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use Illuminate\Support\Facades\Validator;

class DistrictController extends Controller
{
    //
     public function store(Request $request)
    {
        // code...
        $validator = Validator::make($request->all(),[
            'nom_district' => 'required',
            'id_conference' => 'required',
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
        $district = District::create($input);
            
          $response = [
            'success'=>true,
            'data'=>$district,
            'message'=>"User register successfully"
        ];

    return response()->json($response,200);   
    }
    public function show()
    {
        // code...
        $conference_select = \Request::get('conference_select');

        $districts = District::with('conference')
        ->where(function($query) use($conference_select){
            if($conference_select){
                $query->where('id_conference', '=',$conference_select);
            }
        })
        ->get();
        return $districts;

    }
    public function update(Request $request,$id)
    {
        // code...
         $updateD = District::findOrFail($id);
         $input = $request->all();  
         $updateD->fill($input)->update();
    }
    public function delete(Request $request,$id)
    {
        // code...
         $deleteD = District::findOrFail($id);
         $deleteD->delete();
    }
    
}
