<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\District;

class District extends Model
{
    use HasFactory;
    protected $table = 'districts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nom_district',
        'id_conference',
        'nom_sur_district',
        'email_sur_district',
        'phone_sur_district'
    ];
    public function conference()
    {
        return $this->hasMany(Conference::class,'id','id_conference');
    }
}
