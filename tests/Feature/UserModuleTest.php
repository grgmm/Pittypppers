<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
Use App\User;
Use App\Profession;


class UserModuleTest extends TestCase
{
   
    use RefreshDatabase;
    
/**
     * A basic test example.
     *
     * @test
       */

function Prueba_sinusuarios()

{
   
     
    $this->get('/usuarios')
    ->assertStatus(200)
    ->assertSee('No hay Usuarios Creados');
}



/**
     * A basic test example.
     *
     * @test
       */

function Usuario_no_encontrado()

{   
     
    $this->get('/usuarios/1000')
    ->assertStatus(404)
    ->assertSee('USUARIO NO ENCONTRADO');
}



    /**
     * A basic test example.
     *
     * @test
     */



    function usuarios_listado()
    {

               
                 
    Factory(User::class)->create(['name' => 'pedro',]);
    Factory(User::class)->create(['name' => 'pablo',]);
  
        $this->get('/usuarios/')
        -> assertStatus(200)
        -> assertSee('pedro')
        -> assertSee('pablo');

        

    }
     /**
     * A basic test example.
     *
     * @test
         */

 
 function Prueba_detalle_usuario()

{
  

    $user=Factory(User::class)
    ->create(['name' => 'Miguel ANGEL',]);
	
   $this->get('/usuarios/'.$user->id) 

	->assertStatus(200)

    ->assertSee('Miguel ANGEL');
}

 /**
     * A basic test example.
     *
     * @test
       */
     

function Prueba_usuario_nuevo_carga()

{
	 

    $this->get('/usuarios/nuevo')



	->assertStatus(200)
	->assertSee( 'CREAR USUARIOS:');
}
/**
     * A basic test example.
     *
     * @test
       */
    
function Form_Prueba_usuario_nuevo_crea()

{

    
  //$this->withoutExceptionhandling();

$this->from('usuarios/nuevo')->post('/usuarios/crear',['name'=>'test-borrame11',
'email'=>'borrame11@gmail.com',
'password'=>'123456',])->assertRedirect('usuarios');

//->assertSee('PROCESANDO INFORMACION.....');




    $this->assertDatabasehas('users',['name'=>'test-borrame11',
'email'=>'borrame11@gmail.com',
//'password'=>'123456',

]);


}


/**
     * A basic test example.
     *
     * @test
       */

function Form_nombre_necesario_usuario()
{
  // $this->withoutExceptionhandling();
  // Factory(Profession::class)->times(10)->create();

$this->from('usuarios/nuevo')->post
('/usuarios/crear',[
    'name'=>'',
    'email'=>'borrame2@gmail.com',
    'password'=>'123456',]) 
                ->assertRedirect('usuarios/nuevo')
                ->assertSessionHasErrors(['name'=>'El Campo Nombre es Obligatorio']);

$this->assertDatabasemissing('users',['email'=>'borrame2@gmail.com']); //que no se agrega el usuario

}

/**
     * A basic test example.
     *
     * @test
       */

function Form_email_necesario_usuario()
{
  // $this->withoutExceptionhandling();

$this->from('usuarios/nuevo')->post
('/usuarios/crear',[
    'name'=>'borrame3',
    'email'=>'',
    'password'=>'123456',]) 
                ->assertRedirect('usuarios/nuevo')
                ->assertSessionHasErrors(['email']);
}
/**
     * A basic test example.
     *
     * @test
       */

function form_email_valido_necesario_usuario()
{
  //$this->withoutExceptionhandling();

$this->from('usuarios/nuevo')->post
('/usuarios/crear',[
    'name'=>'borrame4',
    'email'=>'novalido',
    'password'=>'123456',]) 
                ->assertRedirect('usuarios/nuevo')
                ->assertSessionHasErrors(['email']);
         
}


/**
     * A basic test example.
     *
     * @test
       */

function form_email_unico_necesario_usuario()
{
// $this->withoutExceptionhandling();

        Factory(User::class)->create(['email' => 'borrame5@gmail.com',]);


$this->from('usuarios/nuevo')->post
('/usuarios/crear',[
    'name'=>'borrame5',
    'email'=>'borrame5@gmail.com',
    'password'=>'123456',]) 
                ->assertRedirect('usuarios/nuevo')
                ->assertSessionHasErrors(['email']);
                $this->assertDatabasemissing('users',['email'=>'borrame5gmail.com']); //que no se agrega el usuario


}

/**
     * A basic test example.
     *
     * @test
       */

function form_pasword_password_necesario_usuario()
{
 //this->withoutExceptionhandling();
   
$this->from('usuarios/nuevo')->post
('/usuarios/crear',[
    'name'=>'borrame4',
    'email'=>'borrame4@gmail.com',
    'password'=>'',]) 
                ->assertRedirect('usuarios/nuevo')
                ->assertSessionHasErrors(['password']);
                $this->assertDatabasemissing('users',['email'=>'borrame4gmail.com']); //que no se agrega el usuario



}


/**
     * A basic test example.
     *
     * @test
       */

function form_password_mayor_a_seis_caracteres_necesario_usuario()
{
    //$this->withoutExceptionhandling();
        
  // Factory(Profession::class)->times(10)->create();

$this->from('usuarios/nuevo')->post
('/usuarios/crear',[
    'name'=>'borrame6',
    'email'=>'borrame6@gmail.com',
    'password'=>'12345',]) 
                ->assertRedirect('usuarios/nuevo')
                ->assertSessionHasErrors(['password']);
                $this->assertDatabasemissing('users',['email'=>'borrame6gmail.com']); //que no se agrega el usuario


}

    /**
     * A basic test example.
     *
     * @test
       */
     

function Prueba_editar_usuario_carga()

{
     
    // $this->withoutExceptionhandling();


$user=Factory(User::class)
    ->create();
//dd($user->id);

    $this->get('/usuarios/'.$user->id.'/editar')
   ->assertStatus(200)
   ->assertViewIs('users-edit')
   ->assertSee('Editar Usuarios:')
   ->assertViewHas('user');
   // function($viewUser) use ($user) {
      //  return $viewUser->id == $user->id;
  //  });
    
    }

   
/**
     * A basic test example.
     *
     * @test
       */
    
function usuario_actualiza()

{
// $this->withoutExceptionhandling();

    $user=Factory(User::class)
    ->create();    
   
   $arreglo= ['name'=>'test-borrame10',
'email'=>'borrame10@gmail.com',
'password'=>'123456',
];

$this->put("/usuarios/{$user->id}",
   $arreglo)
->assertRedirect("/usuarios/{$user->id}");


//dd($arreglo);

$this->assertCredentials($arreglo);

}


/**
     * A basic test example.
     *
     * @test
       */

function Form_nombre_necesario_usuario_update()
{
 // $this->withoutExceptionhandling();
 $user=Factory(User::class)->create();

$this->from("/usuarios/{$user->id}/editar")->put("/usuarios/{$user->id}", 
    ['name'=>'',
    'email'=>'borrame2@gmail.com',
    'password'=>'123456'])
                ->assertRedirect("/usuarios/{$user->id}/editar")
                ->assertSessionHasErrors(['name'=>  'El Campo Nombre es Obligatorio']);
//$this->assertDatabasemissing('users',['email'=>'borrame2@gmail.com']); que no se creo el usuario con ese email

                $this->assertDatabasemissing('users',['email'=>'borrame2@gmail.com']); //que no se agrega el usuario



              //  $this->assertEquals(1, User::count()); //que no se creo un usuario partiendo de que se está utilizando use RefreshDatabase en las pruebas


}

/**
     * A basic test example.
     *
     * @test
       */

function Form_email_necesario_usuario_update()
{
  // $this->withoutExceptionhandling();
     $user=Factory(User::class)->create(['name'=>'nombre viejo',]);

$this->from("/usuarios/{$user->id}/editar")->put("/usuarios/{$user->id}", 
    ['name'=>'nombre nuevo',
    'email'=>'',
    'password'=>'123456'])
                ->assertRedirect("/usuarios/{$user->id}/editar")
                ->assertSessionHasErrors(['email'=>  'El campo Correo es Obligatorio']);
//$this->assertDatabasemissing('users',['email'=>'borrame2@gmail.com']); que no se creo el usuario con ese email

              
                $this->assertDatabasemissing('users',['name'=>'nombre nuevo']); //que no se agrega el usuario

           


}


/**
     * A basic test example.
     *
     * @test
       */

function form_email_valido_necesario_usuario_update()
{
  //$this->withoutExceptionhandling();

 $user=Factory(User::class)->create();

$this->from("/usuarios/{$user->id}/editar")->put("/usuarios/{$user->id}", 
    ['name'=>'borrame x',
    'email'=>'correo-invalido',
    'password'=>'123456'])
                ->assertRedirect("/usuarios/{$user->id}/editar")
                ->assertSessionHasErrors(['email']);
//$this->assertDatabasemissing('users',['email'=>'borrame2@gmail.com']); que no se creo el usuario con ese email

                 $this->assertDatabasemissing('users',['email'=>'correo-invalido']); //que no se agrega el usuario

         
}


/**
     * A basic test example.
     *
     * @test
       */

function form_password_opcional_usuario_update() //si se deja en blanco no se actualiza mantiene el que tenia
{
 //$this->withoutExceptionhandling();
    $oldpassword='CLAVE ANTERIOR';

     $user= Factory(User::class)->create(['password'=>bcrypt($oldpassword)]);


$this->from("/usuarios/{$user->id}/editar")->put("/usuarios/{$user->id}", 
    ['name'=>'borrame x',
    'email'=>'borramex@gmail.com',
    'password'=>''])
                ->assertRedirect("/usuarios/{$user->id}");//pag de detalle del usuario
                $this->assertCredentials(['name'=>'borrame x', 'password'=>$oldpassword, 'email'=> 'borramex@gmail.com']); //se utiliza assertCredentials cuando se quiere validadar la actualización de contraseñas
                              
              

}
/**
     * A basic test example.
     *
     * @test
       */



function form_email_unico_usuario_update() //si se deja en blanco no se actualiza
{
   
   // $this->withoutExceptionhandling();

            $user1= Factory(User::class)->create();
            $correorepetido=$user1->email;

            $user2= Factory(User::class)->create();
        
        $this->from("/usuarios/{$user2->id}/editar")->put("/usuarios/{$user2->id}", 
    ['name'=>'nombre actualizado',
    'email'=>$correorepetido,
    'password'=>'12345678'])
    ->assertRedirect("/usuarios/{$user2->id}/editar");

               
     $this->assertDatabasemissing('users',['name'=>'nombre actualizado']); //que no se agrega el usuario
     
}

/**
     * A basic test example.
     *
     * @test
       */



function form_email_permitir_email_anterior_usuario_update()
{
$this->withoutExceptionhandling();
      $oldemail= 'anterior@gmail.com';

       $user= Factory(User::class)->create(['name'=>'nombre anterior', 'email'=> $oldemail]);

        $this->from("/usuarios/{$user->id}/editar")->put("/usuarios/{$user->id}", 
    ['name'=>'nombre actualizado',
    'email'=>$oldemail,
    'password'=>'123456'])
    ->assertRedirect("/usuarios/{$user->id}");
               
    $this->assertDatabasehas('users',['name'=>'nombre actualizado',
'email'=>$oldemail,]);                     

              
              //$this->assert(assertion)rtEquals(1, User::count()); //que no se creo un usuario partiendo de que se está utilizando use RefreshDatabase en las pruebas






}

/**
     * A basic test example.
     *
     * @test
       */



function form_email_borra_un_usuario()
{
    $this->withoutExceptionhandling();

       $user= Factory(User::class)->create(['email'=>'borramex@gmail.com']);

        $this->delete("/usuarios/{$user->id}")
    ->assertRedirect("/usuarios");
    $this->assertDatabasemissing('users',['email'=>'borramex@gmail.com']); //que no se agrega el usuario






}



}