<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Montant extends Model
{
    protected $table='montants';
    protected $fillable=['initial','gain','client_id'];
    
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
