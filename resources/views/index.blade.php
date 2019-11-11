@extends('layouts.app')
@section('title','Trainers')
@section('content')
@csrf
<p>Listado de trainers    </p>
<p></p>
<div class="row">
@foreach($trainers as $trainer)
<div class="col-sm">
	<div class="card text-center" style="width: 18rem; margin-top:70px; ">
	<img style="height: 100px;width: 100px;
	background-color: #EFEFEF; margin: 20px;
	"class="card-img-top rounded-circle mx-auto d-block"
	src="images/{{$trainer->avatar}}" alt="">
	<div class="card-body">
<h5 class="card-title"> {{$trainer->name}}</h5>
<p class="card-text">Some quick example text to
build on the card title and make up the bulk of the card's content</p>
<a href="/trainers/{{$trainer->slug}}" class="btn btn-primary">Ver más...</a>
<a href="/delete/{{$trainer->id}}" class="btn btn-primary">Delete...</a>
<a href="/trainers/{{$trainer->id}}" class="btn btn-secundary">Editar...</a>
<a href="/imprimir/ind/{{$trainer->id}}" class="btn btn-secundary">Imprimir...</a>
<a href="{{route('verindi')}}">Imprimir individual 1</a>
<a href="{{route('verindi5')}}">Imprimir individual6</a>
</div>

</div>
<a href="/imprimir/{{$trainer->slug}}" class="btn btn-secundary">Imprimir...</a>

</div>
@endforeach
</div>
@endsection