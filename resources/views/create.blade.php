@extends('layouts.app')
@section('title', 'Trainers Create')
@section('content')

{!!Form::open(['route'=>'trainers.store','method'=>'POST','files'=>'true'])  !!}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10"><div class="from-group">
            {{Form::label('name','Nombre')}}
            {{Form::text('name',null,['class'=>'form-control'])}}
            {{Form::label('apellido', 'Apellido')}}
            {{Form::text('apellido',null,['class'=>'form-control'])}}
        </div>
        <div class="from-group">

            {{Form::label('avatar', 'Avatar')}}
            {{Form::file('avatar')}}
        </div>

                {{Form::submit('Guardar',['class'=>'btn btn_primary'])}}
            </div>
        </div>
    </div>
{!!Form::close()!!}
@endsection

