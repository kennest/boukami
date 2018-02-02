<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parametre extends Model
{
    protected $table='parametres';
    protected $fillable=['niveau_courant','valeur','created_at','updated_at','dernier_code'];
}
