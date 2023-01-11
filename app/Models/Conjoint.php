<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Paroisse;
use App\Models\Categorie;

class Conjoint extends Model
{
    use HasFactory;
    protected $table = 'conjoints';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nom_conjoint',
        'prenom_conjoint',
        'nom_pere_conjoint',
        'nom_mere_conjoint',
        'date_naissance_conjoint',
        'colline_conjoint',
        'commune_conjoint',
        'province_conjoint',
        'nationalite_conjoint',
        'cin_conjoint',
        'etat_civil_conjoint',
        'fonction_conjoint',
        'telephone_conjoint',
        'photo_conjoint',
        'id_paroisse',
        'id_uti',
        'matricule_membre',
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
