@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Usuario</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('registro.create') }}" class="btn btn-info" >Añadir Usuario</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Nombre</th>
               <th>Apellido</th>
               <th>correo</th>
               <th>Telefono</th>
             </thead>
             <tbody>
              @if($registros->count())  
              @foreach($registros as $registro)  
              <tr>
                <td>{{$registro->nombre}}</td>
                <td>{{$registro->apellido}}</td>
                <td>{{$registro->correo}}</td>
                <td>{{$registro->telefono}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('RegistroController@edit', $registro->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('RegistroController@destroy', $registro->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
      {{ $registros->links() }}
    </div>
  </div>
</section>

@endsection
