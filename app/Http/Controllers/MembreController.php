<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Membre;
use App\Models\District;
use DB;

class MembreController extends Controller
{
    //
    public function show()
    {
        // code...
        $district_select = \Request::get('district_select');
        $id_paroisse = \Request::get('id_paroisse');
        $date_debut = \Request::get('date_debut');
        $date_fin = \Request::get('date_fin');
        $membres = Membre::with('categorie','user','paroisse')
        ->join('paroisses','membres.id_paroisse','=','paroisses.id')
        ->join('districts','paroisses.id_district','=','districts.id')
        ->where(function($query) use($district_select,$id_paroisse,$date_debut,$date_fin){
            if($district_select){

                $query->where('paroisses.id_district', '=',$district_select);
            }
             if($id_paroisse){

                $query->where('membres.id_paroisse', '=',$id_paroisse);
            }
            if($date_debut){

                $query->whereDate('membres.debut_ministere_membre', '>=',$date_debut);
            }
            if($date_fin){

                $query->whereDate('membres.debut_ministere_membre', '<=',$date_fin);
            }
        })
        ->orderBy('membres.matricule_membre','desc')
        ->get();
        return  $membres;
    }

    public function membres_coti()
    {
        # code...
        $district_select = \Request::get('district_select');
        $id_paroisse = \Request::get('id_paroisse');
        $membres = Membre::with('categorie','user','paroisse')
        ->join('paroisses','membres.id_paroisse','=','paroisses.id')
        ->where('membres.statut','=','actif')
        ->where(function($query) use($district_select,$id_paroisse){
            if($district_select){

                $query->where('paroisses.id_district', '=',$district_select);
            }
             if($id_paroisse){

                $query->where('membres.id_paroisse', '=',$id_paroisse);
            }
        })
        ->get();
        return  $membres;
    }
    public function info_membre($id)
    {
        // code...
        $info_membre = Membre::with('categorie','user','paroisse')
        ->where('matricule_membre','=',$id)
        ->get();
        return $info_membre;
    }

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
            'matricule_membre'=>'CAPEML-'.$date.'-0'.$count,
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
    public function update(Request $request,$id)
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

        $updateMembre=DB::table('membres')
        ->where('matricule_membre',$id)
        ->update(['nom_membre'=>$request->get('nom_membre'),
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
            'id_categorie'=>$request->get('id_categorie'),
            'id_paroisse'=>$request->get('id_paroisse'),
                   // 'id_district'=>$request->get('id_paroisse'),

        ]);  

        $response = [
            'success'=>true,
            'data'=>$updateMembre,
            'message'=>"Paroisse register successfully"
        ];

        return response()->json($response,200); 
    }
    public function sumCotisation($id)
    {
        # code..
        // $membres = Membre::with('categorie','user','paroisse')
        // ->join('paroisses','membres.id_paroisse','=','paroisses.id')
        $sumMembre = DB::table('membres')
        ->join('cotisations','cotisations.matricule_membre','=','membres.matricule_membre')
        ->select('membres.matricule_membre',DB::raw('sum(cotisations.montant_paye) as sum_cotisation'))
        ->where('membres.matricule_membre','=',$id)
        ->groupBy('membres.matricule_membre')
        ->get();

        return $sumMembre;
    }
    public function addPicture(Request $request,$id)
    {
        # code...

        $request->validate([
            'image_1' => 'required|image|mimes:jpeg,png,gif,svg|max:5048'
        ]);

        try {
          $file = $request->file('image_1');
          $imageName = time() . '.' . $file->getClientOriginalExtension();
          $membre = Membre::where('matricule_membre', $id)->firstOrFail();
          $membre->photo_membre = $imageName;
          $membre->save();
          $file->move(public_path('image'),  $imageName);

      } catch (\Exception $e) {

      }

      
      return  'successfully';
  }

}
