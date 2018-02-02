<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Console\Scheduling\Schedule;

class Client extends Model
{
    protected $fillable=[];
    protected $table='clients';

    public function parrain()
    {
        return $this->belongsToMany(Client::class, 'parrainages', 'client_id', 'parrain_id');
    }

    public function formule()
    {
        return $this->belongsTo(Formule::class);
    }

    public function filleuils()
    {
        return $this->belongsToMany(Client::class, 'parrainages', 'parrain_id', 'client_id');
    }

    //recupere le 1er client du niveau superieur qui n'as pas encore 3 filleuils
    public function scopeNotfull($query)
    {
        $params=Parametre::all()->first();
        return $query->where(function ($q) {
            $q->where('filleuils', '<', 3);
        })
        ->where(function ($q) use ($params) {
            $q->where('niveau', '<', $params->niveau_courant);
        });
    }

    public function scopeFull($query)
    {
        $params=Parametre::all()->first();
        return $query->where('filleuils', '=', 3)
        ->where('niveau', '<', $params->niveau_courant);
    }

    public function filleuilsCount()
    {
        return $this->belongsToMany(Client::class)->selectRaw('count(clients.id) as aggregate');
    }

    public function scopeCurrentLevelClient($query)
    {
        $params=Parametre::all()->first();
        return $query->where('niveau', $params->niveau_courant)->count();
    }
}
