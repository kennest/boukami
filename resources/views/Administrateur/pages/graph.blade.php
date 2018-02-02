@extends('../Layouts.admin') 
@section('content')
<div class="row">
    <div class="col-12">
        <h2>Niveau 1</h2>
        <div class=card-deck>
            @foreach($n1 as $n)
            <div class="card">
                <img class="card-img-top" src="{{Storage::url($n->photo)}}" alt="Card image cap">
                <div class="card-block">
                    <h4 class="card-title">{{$n->nom}}</h4>
                    <p class="card-text">{{$n->prenom}}</p>
                    <p class="card-text"><small class="text-muted">{{$n->code}}</small></p>
                </div>
            </div>
            @endforeach
        </div>
        <h2>Niveau 2</h2>
        <div class=card-deck>
            @foreach($n2 as $n)
            <div class="card">
                <img class="card-img-top" src="{{Storage::url($n->photo)}}" alt="Card image cap">
                <div class="card-block">
                    <h4 class="card-title">{{$n->nom}}</h4>
                    <p class="card-text">{{$n->prenom}}</p>
                    <p class="card-text"><small class="text-muted">{{$n->code}}</small></p>
                </div>
            </div>
            @endforeach
        </div>
        <h2>Niveau 3</h2>
        <div class=card-deck>
            @foreach($n3 as $n)
            <div class="card">
                <img class="card-img-top" src="{{Storage::url($n->photo)}}" alt="Card image cap">
                <div class="card-block">
                    <h4 class="card-title">{{$n->nom}}</h4>
                    <p class="card-text">{{$n->prenom}}</p>
                    <p class="card-text"><small class="text-muted">{{$n->code}}</small></p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection