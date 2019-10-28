<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
Use App\User;



class Controlmm extends Controller
{
	public function index () 
	{	
		/**
		CON EL CONSTRUCTOR DE CONSULTAS A LA DB:

		$users=DB::table('users')->get(); // hay que importar DB colocando al inicio use Illuminate\Support\Facades\DB;

	$title ='Listado de usuarios M M';

	return view('usersmm', compact('title', 'users'));
	*/
//CON ELOQUENT::

	$users=User::all();

	$title ='Listado de usuarios:';

		return view('usersmm')							
		->with('users', $users)	
		->with('title', $title );
	
//otra forma:
	//return view('usersmm', compact('title', 'users'));
	
	}		                   
					
			
	public function show(User $user)	
	{
		//$user=User::find($id);	

	//	if ($user == null) {
	//return view('errors.404');

	//return response()->view('errors.404',[],404);

		
		//$user=User::findOrFail();	

				
	//	return view('users-show', $user);
		
	
	return view('users-show', compact('user'));

	
}


	public function create(User $user)
		{
		return view('create', compact('user'));
		}


	public function store()
		{
$data=request()->validate([
	'name'=>'required',
	'email'=>'required|email|unique:users,email',
	'password'=>'required|min:6'],[
		'name.required'=>'El Campo Nombre es Obligatorio',
		'email.required'=>'El campo Correo es Obligatorio',
		'password.required'=>'El campo Contraseña es Obligatorio',
		'password.min'=>'El campo Contraseña debe ser mayor 6  caracteres',
		]);

//['name'=>'El campo nombre es Obligatorio']
//)


// de la siguiente forma se reemplaza por una mas optima ->validate 

//(empty($data['name'])) {
//return redirect('users/nuevo')->withErrors(['name'=>'El campo nombre es Obligatorio']); // Redirigimos a la URL "/usuarios"

User::create([
'name'=>$data['name'],	
'email'=>$data['email'],
'password'=> bcrypt($data['password']),
]);			
			//return redirect()->route('users.load'); 		
return redirect('usuarios'); // Redirigimos a la URL "/usuarios"
 
}



public function edit(User $user) 
	{

		return view('users-edit', ['user'=>$user]);

	}



public function update(User $user) 
	{
$data=request()->validate(
['name'=>'required',
'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],//'required|email',
'password'=>''
]
,

	[	
		'name.required'=>'El Campo Nombre es Obligatorio',
		'email.required'=>'El campo Correo es Obligatorio',
			]);
if ($data['password']!=null)
{
 $data['password']=bcrypt($data['password']);
} else
{
unset($data['password']);
}
$user->update($data);

		return redirect()->route('users.show', ['user'=> $user]);

	}


public function destroy(User $user) 
	{

		$user->delete();
return redirect()->route('users');



}
}






	
