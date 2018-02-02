@extends('../Layouts.admin')
@section('content')
<div class="row">
    <div class="col-6">
            <h1>Vue Graphique</h1>
            {!! Form::open(['route'=>'vue.client']) !!}
            @if($clients)
            <div class="form-group">
                <label>Clients:</label>
                <select class="form-control" name='client'>
                    @foreach($clients as $c)
                        <option value={{$c->id}}><em class="badge badge-pill badge-primary">{{$c->code}}</em> | {{$c->nom}} {{$c->prenom}}</option>
                    @endforeach
                </select>
            </div>
            @endif
            <div class="form-group">
                   {{Form::submit('Vue graphique des filleuils...',['class'=>'btn btn-success btn-block'])}}
               </div>
    </div>
 {!!Form::close()!!}
</div>
@endsection