@extends('../Layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
@include('errors.validation')
    </div>
<div class="col-6">
    @include('Administrateur.Forms.client')
</div>
<div class="col-6">
    @include('Administrateur.Lists.client')
</div>
</div>
@endsection