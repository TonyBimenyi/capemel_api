<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Membre;

class Categorie extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nom_categorie',
        'montant_a_paye',
    ];
     public function membre(){
        return $this->belongsTo(related:Membre::class,foreignKey:'id_categorie');
    }
}
