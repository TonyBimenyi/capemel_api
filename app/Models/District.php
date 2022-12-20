<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
