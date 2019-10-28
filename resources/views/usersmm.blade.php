
@extends ('layout')

@section('content')

 <h2>{{ $title }}</h2> 
    
               
				 {{--   
				 <a href="{{route('users.show',['id'=>$user]) }}" >Ver detalle </a>
				 <a href="{{route('users.edit',['id'=>$user]) }}" >editar </a>
				 --}}



@if($users->isNotEmpty())
				
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">CORREO</th>
      <th scope="col">ACCIONES</th>
     
    </tr>
  </thead>
  <tbody>

  

    @foreach ($users as $user)
    <tr>
      <td>{{$user->id}}</td>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td> 



<form action="{{url('usuarios', [$user->id])}}" method="POST">
   {{method_field('DELETE')}}
   {{ csrf_field() }}
         
           
         
           <td> 

            <a href="{{route('users.show',$user) }}" class="btn btn-link"   rel="tooltip" title="Detalle de Usuario" > <span class="oi oi-eye"></span> </a>
            
            <a href="{{route('users.edit',$user) }}" class="btn btn-link" rel="tooltip" title="Editar Usuario"><span class="oi oi-pencil"></span> </a>

            <button type="submit" class="btn btn-danger" rel="tooltip" title="Borrar Usuario # {{$user->id}}"><span class="oi oi-trash"></span></button> 
          </td>

          </form>
    </tr>
    @endforeach
    
  </tbody>
</table>

@else

<p>NO HAY USUARIOS REGISTRADOS.</p>

@endif
				  

               
                
               

            </ul>   	

 @section ('sidebar')
@parent      

 <a href="usuarios/nuevo" class ="btn btn-primary"> <th><span class="oi oi-plus">  AGREGAR USUARIOS</span> </th>  </a>

@endsection



@endsection


