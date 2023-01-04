<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conjoint extends Model
{
    use HasFactory;
    protected $table = 'conjoints';
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
}
