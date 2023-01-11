<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Membre;

class Cotisation extends Model
{
    use HasFactory;
    protected $table='cotisations';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'montant_total',
        'trimestre',
        'annee',
        'matricule_membre',
        'id_uti',
    ];
     public function membre()
    {
        return $this->hasMany(Membre::class,'matricule_membre','matricule_membre');
    }
}
