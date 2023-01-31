<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Membre;

class Pension extends Model
{
    use HasFactory;
    protected $table = 'pensions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'motif_pension',
        'matricule_membre',
        'id_uti'
    ];
     public function membre()
    {
        return $this->hasMany(Membre::class,'matricule_membre','matricule_membre');
    }
}
