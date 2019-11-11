@extends('layouts.pdfinicio')
@section('content')

<table class="table table-hover table-striped">
  <thead>
    
    <tr>
      
      <th>ID</th>
      <th>Name</th>
      <th>Apellido</th>
      <th>Avatar</th>
    </tr>
  </thead>
  <tbody>
    @foreach($trainers as $trainer)
    <tr>
      <td>{{$trainer->id}}</td>
      <td>{{$trainer->name}}</td>
      <td>{{$trainer->apellido}}</td>
      <td><img class="card-img-top rounded-circle mx-auto d-block"
  src="images/{{$trainer->avatar}}" alt=""></td>
      <!--<td class="text-right"><img src='/images/1571159123a.png'/></td>-->
    </tr>
    @endforeach
  </tbody>



</table>
@endsection