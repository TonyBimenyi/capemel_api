<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abandon extends Model
{
    use HasFactory;
    protected $table = 'abandons';
    protected $primaryKey = 'matricule_membre';
    protected $fillable = [
        'id',
        'type_abandon',
        'motif',
        'matricule_membre',
        'id_uti'
    ];
}
