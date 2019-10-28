
@extends ('layout')
@section('title', "")
@section('content')



<div class="card">
  <div class="card-header"> <h2> DETALLE DE USUARIO </h2> 
  </div>
  <div class="card-body">
    <h5 class="card-title"></h5>
    <p class="card-text"></p>


    
       <ul> 
       	<h2>USUARIO ID # {{$user->id }},
       		NOMBRE:{{$user->name}},
            EMAIL:{{$user->email}}</h2>
      			 <a href="{{route('users') }}" class="btn btn-link" rel="tooltip" title="Listado de Usuarios"><span class="oi oi-list"></span> </a>

				 <a href="{{route('users.edit',$user) }}" class="btn btn-link" rel="tooltip" title="Editar Usuario"><span class="oi oi-pencil"></span> </a>

				
               	
               

            </ul>   
            
    
  
    </div>
  </div>	
	

@endsection

@section ('sidebar')
@parent      
 <h2>otra barra</h2>

@endsection




