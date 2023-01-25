<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pension extends Model
{
    use HasFactory;
    protected $table = 'pensions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'montant_pension',
        'motif_pension',
        'matricule_membre',
        'id_uti'
    ];
}
