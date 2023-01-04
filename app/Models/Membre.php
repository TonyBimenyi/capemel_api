<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Paroisse;
use App\Models\Categorie;

class Membre extends Model
{
    use HasFactory;
    protected $table = 'membres';
    protected $fillable = [
        'matricule_membre',
        'nom_membre',
        'prenom_membre',
        'nom_pere_membre',
        'nom_mere_membre',
        'date_naissance_membre',
        'colline_membre',
        'commune_membre',
        'province_membre',
        'nationalite_conjoint',
        'cin_membre',
        'debut_ministere_membre',
        'debut_cotisation_membre',
        'date_mariage',
        'email',
        'telephone_membre',
        'photo_membre',
        'statut',
        'id_uti',
        'id_paroisse',
        'id_categorie',
    ];
     public function paroisse()
    {
        return $this->hasMany(Paroisse::class,'id','id_paroisse');
    }
     public function user()
    {
        return $this->hasMany(User::class,'id','id_uti');
    }
     public function categorie()
    {
        return $this->hasMany(categorie::class,'id','id_categorie');
    }
}
