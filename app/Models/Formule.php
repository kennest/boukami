<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formule extends Model
{
    protected $table="formules";
    
    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}
