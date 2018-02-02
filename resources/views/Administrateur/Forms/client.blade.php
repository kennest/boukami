<fieldset>
    @if($client) {!! Form::model($client, ['route' => ['client.update', $client->id],'files' => true]) !!}
    <legend>Modifier Client</legend>
    @else {!! Form::model($client=null,['route' => ['client.add'],'files' => true]) !!}
    <legend>Ajouter Client</legend>
    @endif {!! Form::token() !!} 
    @if($open_clients)
    <div class="form-group">
        <label>Parrains:</label>
        <select class="form-control" name='parrain'>
            @foreach($open_clients as $oc)
                <option value={{$oc->id}}><em class="badge badge-pill badge-primary">{{$oc->code}}</em> | {{$oc->nom}} {{$oc->prenom}}</option>
            @endforeach
        </select>
    </div>
    @endif
    @if($formules)
    <div class="form-group">
        <label>Formule:</label>
        <select class="form-control" name='formule'>
            @foreach($formules as $f)
                <option value={{$f->id}}>{{$f->label}} > Initial: {{$f->initial}} XOF > Gain:{{$f->gain}} XOF> Delai: {{$f->delai_remboursement}} mois</option>
            @endforeach
        </select>
    </div>
    @endif
    <div class="row">
            <div class="form-group col-6">
                    {{ Form::label('nom', 'Nom') }} {{ Form::text('nom',$client?$client->nom:null,['class' => 'form-control','placeholder' =>
                    'Nom...']) }}
                </div>
                <div class="form-group col-6">
                    {{ Form::label('prenom', 'Prenom') }} {{ Form::text('prenom',$client?$client->prenom:null,['class' => 'form-control','placeholder'
                    => 'Prenom...']) }}
                </div>
    </div>

    <div class="row">
            <div class="form-group col-6">
                    {{ Form::label('age', 'Age') }} 
                    {{ Form::number('age',$client?$client->age:null,['class' => 'form-control','placeholder'=> 'Age...']) }}
                </div>
                <div class="form-group col-6">
                    {{ Form::label('sexe', 'Sexe') }} 
                    {{Form::select('sexe', ['H' => 'Homme', 'F' => 'Femme'], null, ['placeholder' => 'Votre sexe...','class'=>'form-control'])}}
                </div>
    </div>
   
    <div class="form-group">
        {{ Form::label('photo', 'Photo') }}
        {{ Form::file('photo',null,['class' => 'form-control','placeholder' => 'Photo...']) }}
    </div>

    <div class="form-group">
            {{ Form::label('nature_piece', 'Nature de la pièce') }}
        {{Form::select('nature_piece', ['CNI' => 'CNI', 'ATT' => 'ATTESTATION','PASS'=>'PASSPORT'], null, ['placeholder' => 'Nature
        de piece...','class'=>'form-control'])}}
    </div>
    <div class="form-group">
        {{ Form::label('num_piece', 'Numero de piece') }} {{ Form::text('num_piece',$client?$client->num_piece:null,['class' => 'form-control','placeholder'
        => 'Numero de piece...']) }}
    </div>
    <div class="row">
            <div class="form-group col-6">
                    {{ Form::label('telephone', 'Telephone') }} {{ Form::text('telephone',$client?$client->telephone:null,['class' => 'form-control','placeholder'
                    => 'Telephone...']) }}
                </div>
                <div class="form-group col-6">
                    {{ Form::label('habitation', 'Lieu d habitation') }} {{ Form::text('habitation',$client?$client->habitation:null,['class'=>
                    'form-control','placeholder' => 'Lieu d habitation...']) }}
                </div>
    </div>
    <div class="form-group">
        {{Form::submit('Enregistrer',['class'=>'btn btn-success btn-block'])}}
    </div>
    {!! Form::close() !!}
</fieldset>