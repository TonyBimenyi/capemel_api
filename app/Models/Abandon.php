<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Membre;
use App\Models\paroisse;

class Abandon extends Model
{
    use HasFactory;
    protected $table = 'abandons';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'type_abandon',
        'motif',
        'matricule_membre',
        'id_uti'
    ];

    public function paroisse()
    {
        # code...
        return $this->hasMany(Paroisse::class);
    }
     public function membre()
    {
        return $this->hasMany(Membre::class,'matricule_membre','matricule_membre');
    }
    // public function membre()
    // {
    //     # code...
    //     return $this->hasManyThrough(
    //          Paroisse::class,
    //      Membre::class,
        
    //      'matricule_membre',
    //      'id_paroisse',
    //      'id',
    //      'id'
    //  );
    // }
}
