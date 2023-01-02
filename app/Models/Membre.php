<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    use HasFactory;
    protected $table = 'membres';
    protected $primaryKey = 'matricule_membre';
    protected $fillable = [
        'matricule_membre',
        'nom_membre',
        'prenom_membre',
        'nom_pere_membre',
        'nom_mere_membre',
        'date_naissance_membre',
        'colline_membre',
        'commune_membre',
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
}
