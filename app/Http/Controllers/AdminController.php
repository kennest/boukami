<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Parametre;
use Illuminate\Support\Str;
use App\Models\Formule;
use Illuminate\Database\Eloquent\Collection;

class AdminController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('Administrateur.index');
    }

    public function vue()
    {
        $clients=Client::all();
        return view('Administrateur.pages.vue', compact('clients'));
    }

    public function vueClient(Request $request)
    {
        $this->validate($request, [
            'client'=>'required',
        ]);
        $client=Client::find($request->input('client'));
        $filleuils=$this->find_filleuils($client);
        dd($filleuils);
    }

    public function editClient($id=null)
    {
        //dd(Client::currentlevelclient());
        //On recupere les clients du niveau superieur qui n'ont pas encore 3 filleuils
        $open_clients=Client::where(function ($q) {
            return $q->notfull();
        })->get();

        $formules=Formule::all();
        $client=Client::find($id);
        return view('Administrateur.pages.client', compact('client', 'open_clients', 'formules'));
    }

    public function add(Request $request)
    {
        $this->validate($request, [
                    'nom'=>'required',
                    'prenom'=>'required',
                    'nature_piece'=>'required',
                    'num_piece'=>'required',
                    'telephone'=>'required|phone:CI',
                    'photo'=>'required',
                    'sexe'=>'required',
                    'formule'=>'required',
        ]);

        //On met a jour le niveau courant
        $params=Parametre::all()->first();

        //niveau en cours
        $current_level=$params->niveau_courant;

        //nombre max du niveau en cours
        $current_level_number=$params->vmax;

        
        $client=new Client();

        $formule=Formule::find($request->input('formule'));

        $client->nom=$request->input('nom');
        $client->prenom=$request->input('prenom');
        $client->nature_piece=$request->input('nature_piece');
        $client->num_piece=$request->input('num_piece');
        $client->telephone=$request->input('telephone');
        $client->sexe=$request->input('sexe');
        $client->niveau=$params->niveau_courant;
        $client->statut=false;
        $client->filleuils=0;
        $client->habitation=$request->input('habitation');
        $client->age=$request->input('age');

        //Upload photo
        $path = $request->photo->store('public/images');
        $client->photo=$path;

        //si le parrain est choisi dans la liste
        $parrain=new Client();
        if ($request->input('parrain')) {
            $parrain_id=$request->input('parrain');
            $parrain=Client::find($parrain_id);
            $parrain->filleuils=$parrain->filleuils+1;
            $parrain->save();

            
            //on genere le code a partir du code du parrain
            $prefix=Str::after($parrain->code, '-');
            $code=$prefix.'-'.rand(0, 999999999);

            $client->code=$code;
            $client->formule()->associate($formule);
            $client->save();
            $parrain->filleuils()->attach($client);
            
            $parrain->save();
        //sinon il s'agit du premier client
        } else {
            $code='000000000'.'-'.rand(0, 999999999);
            $client->code=$code;
            $client->formule()->associate($formule);
            $client->save();
        }
           
        //nombre de client du niveau courant
        $nb_curr_level=Client::where('niveau', $current_level)->count();

        //si on a deja atteint le nombre de client pour le niveau courant on augmante le niveau et Vmax
        if (($nb_curr_level)==$current_level_number) {
            $params=$this->upgrade($params);
        }
           
        return redirect()->back();
    }

    //Mise a jour du client
    public function update(Request $request)
    {
    }

    private function upgrade(Parametre $params):Parametre
    {
        $params->niveau_courant=($params->niveau_courant+1);
        $params->vmax=3*$params->vmax;
        $params->save();
        return $params;
    }

    private function find_filleuils(Client $c):Collection
    {
        $adn=Str::after($c->code, '-');
        $filleuils=Client::where('niveau', '=', $c->niveau+1)->get()->reject(function ($q) use ($adn) {
            if (Str::before($q->code, '-')!=$adn) {
                return $q;
            }
        });
        return $filleuils;
    }
}
