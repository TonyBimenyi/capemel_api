<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfant extends Model
{
    use HasFactory;
    protected $table = 'enfants';
    protected $primaryKey ='id';
    protected $fillable = [
      'id',
      'nom_enfant',
      'prenom_enfant',
      'date_naissance_enfant',
      'id_uti',
      'matricule_membre',
    ];
}
