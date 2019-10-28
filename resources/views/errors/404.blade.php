@extends ('layout')

@section('title', "USUARIO NO ENCONTRADO (OJO NO SE VE CORREGIR)")


@section('content')

 <h2>USUARIO NO ENCONTRADO</h2>

 	<a href="{{route('users')}}" >Listado de Usuarios </a>


      
@endsection

@section ('sidebar')
@parent      
 <h2>otra barra</h2>
@endsection
