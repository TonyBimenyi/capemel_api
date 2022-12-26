<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\District;

class Conference extends Model
{
    use HasFactory;
    protected $table = 'conferences';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nom_conference',
    ];
    public function district(){
        return $this->belongsTo(related:District::class,foreignKey:'id_conference');
    }
}
