<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotisation extends Model
{
    use HasFactory;
    protected $table='cotisations';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'montant_total',
        'trimestre_annee',
        'matricule_membre',
        'id_uti',
    ];
}
