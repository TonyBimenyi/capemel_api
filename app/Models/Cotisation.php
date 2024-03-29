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
        'montant_paye',
        'montant_a_paye',
        'trimestre',
        'annee',
        'numero_bordereau',
        'date_paiement',
        'matricule_membre',
        'id_district',
        'id_uti',
    ];
    // const CREATED_AT = 'created_at_abandon';

     public function membre()
    {
        return $this->hasMany(Membre::class,'matricule_membre','matricule_membre');
    }

}
