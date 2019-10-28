@extends ('layout')
@section('title', "")
@section('content')




<div class="card">
  <div class="card-header"> <h2> CREAR USUARIO</h2> 
  </div>
  <div class="card-body">
    <h5 class="card-title"></h5>
    <p class="card-text"></p>






@if ($errors->any())
  
  
<div class="alert alert-danger"> 
  <p>POR FAVOR CORREGIR LOS SIGUIENTES ERRORES:</p>

         <ul>
    @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
  </ul>       

  </div>

@endif


<form method="POST" class="form-horizontal" action="{{url('/usuarios/crear')}}">

	{{ csrf_field() }}
  
<div class="form-group">
    <label for="name" class="col-sm-2 control-label">Nombre:</label>
    <div class="col-sm-10">
      <input type="text" name="name" class="form-control" id="name" placeholder="ej Pablo Perez" value = "{{ old('name')}}">
      
      
     </div>
 </div>

  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Correo:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" id="email" placeholder="ej usr@pittyppers.com:" value = "{{ old('email')}}">
    
    
    </div>
  </div>

  
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Contraseña:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name ="password" id="password">
     
    </div>
  </div>

  

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
           <button type="submit" class="btn btn-primary" ">CREAR</button> 
       <a href="{{route('users') }}" class="btn btn-link" rel="tooltip" title="Listado de Usuarios"><span class="oi oi-list"></span> </a>

    </div>
  </div>



      
    </div>
  </div> 



</form>

         


     




@endsection

@section ('sidebar')
@parent      
 <h2>otra barra</h2>

@endsection
