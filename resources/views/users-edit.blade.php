

@extends ('layout')

@section('title', "")


@section('content')


<div class="card">
  <div class="card-header"> <h2>EDITAR USUARIO. </h2> 
  </div>
  <div class="card-body">
    <h5 class="card-title"></h5>
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
    <p class="card-text">Persiste el valor anterior del campo, si usted lo actualiza.
 

<form method="Post" class="form-group" action="{{ url('/usuarios', $user->id) }}">
      {{ method_field('PUT') }}
      {{ csrf_field() }}



<div class="form-group">
    <label for="name" ">Nombre:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" id="name" placeholder="ej pp" value = "{{ old('name', $user->name )}}">

      
     
        
     </div>
 </div>

  <div class="form-group">
    <label for="email" class="col-sm-10 control-label">Correo:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" id="email" placeholder="ej u@p.c:" value = "{{ old('email', $user->email) }}">
      
     
    
    </div>
  </div>

    
  <div class="form-group">
    <label for="password" class="col-sm-10 control-label">Contraseña:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name ="password" id="password">
      
    </div>
  </div>

  

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10"> 
      <button type="submit" class="btn btn-primary" ">EDITAR</button> 
       <a href="{{route('users') }}" class="btn btn-link" rel="tooltip" title="Listado de Usuarios"><span class="oi oi-list"></span> </a>


               

      
    </div>
       </div>
          </div>
  </div>
</form> 



         

@endsection

  </div>
</div>





