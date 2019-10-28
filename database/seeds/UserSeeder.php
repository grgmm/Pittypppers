<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

     {  



	//$profession= DB::select("SELECT id FROM professions LIMIT 1");


	// dd($profession);



$profession_id = DB::table('professions')
->wherename('Desarrollador Integrador-Web') //metodo "magico" se coloca el nombre de la columna pegado  al where y laravel lo asume el prier argmento se asume como = a arg
->value ('id');

    	
        
//DB::table('users')->insert(['name' => 'TULIO MEDINA',
//'email' => 'tulio@melomama.com', 'password' => bcrypt('laravel'), 'profession_id'=> $profession_id->id,
//]);


//User::Create(['name' => 'MIGUEL ANGEL MORENO',
//'email' => 'morenomx@erpitty.com', 'password' => bcrypt('laravel'), 'profession_id'=> $profession_id,'is_admin'=>true]);


Factory(User::class)->create(['name' => 'MIGUEL ANGEL MORENO',
'email' => 'morenomx@erpitty.com', 'password' => bcrypt('laravel'), 'profession_id'=> $profession_id,'is_admin'=>true]);
    Factory(User::class)->create(['profession_id'=>$profession_id]);
    Factory(User::class)->times(18)->create();
    Factory(User::class)->create(['name' => 'lolo',]);
    Factory(User::class)->create(['name' => 'lolin',]);




/**
    
User::Create(['name' => 'JULIO PEREZ',
'email' => 'lolo@erpitty.com', 'password' => bcrypt('laravel'), 'profession_id'=> '1',]);

User::Create(['name' => 'CARLOS MELO',
'email' => 'lolin@erpitty.com', 'password' => bcrypt('laravel'), 'profession_id'=>'1']);
    
User::Create(['name' => 'CARLOS PELO',
'email' => 'lolillin@erpitty.com', 'password' => bcrypt('laravel'), 'profession_id'=> '3']);

*/

    }   


   

}
