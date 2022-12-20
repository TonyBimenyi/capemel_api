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
            'id_conference' => 'required|email',
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
        $districts = District::all();
        return $districts;
    }
    
}
