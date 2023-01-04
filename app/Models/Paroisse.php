<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\District;
use App\Models\Paroisse;
use App\Models\Conjoint;

class Paroisse extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'paroisses';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nom_paroisse',
        'id_district',
        'nom_tut_paroisse',
        'phone_tut_paroisse',
        'email_tut_paroisse'
    ];
    public function district()
    {
        return $this->hasMany(District::class,'id','id_district');
    }


    public function membre(){
        return $this->belongsTo(related:Membre::class,foreignKey:'id_paroisse');
    }
     public function conjoint(){
        return $this->belongsTo(related:Conjoint::class,foreignKey:'id_paroisse');
    }
}
