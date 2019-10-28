<?php

Use Illuminate\Database\Seeder;
Use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Facades\Schema;
Use App\Profession;

 	
class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   
//Schema::disableForeignKeyConstraints(); no funciona
    public function run()
    {

 //DB::insert("INSERT INTO professions (name) VALUES ('mamalo')");

	// DB::insert("insert into professions (name) values (:parametro_name)", ['parametro_name'=> 'funciona' ]);    TRABAJANDO CON SQL DIRECTMENTE
	

// DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); FUNCIONA en MYSQL MAS NO EN POSTGRESQL hw_Error(connection)N 


// DB::statement('SET FOREIGN_KEY_CHECKS = 1;');FUNCIONA en MYSQL MAS NO EN POSTGRESL hw_Error(connection)N 


//DB::table('professions')->insert(['name' => 'Desarrollador Back-end',]); TRABAJANDO CON EL CONSTRUCTOR DE CONSULTAS DE LARAVEL


Profession::Create(['name' => 'Desarrollador Back-end','profession_id'=>null]); //TRABAJANDO CON UN MODELO DE LARAVEL (EN UN NIVEL MAS ALTO QUE LOS ANTRIORES)

Profession::Create(['name' => 'Desarrollador Front-end','profession_id'=>null]); 

Profession::Create(['name' => 'Desarrollador Integrador-Web','profession_id'=>null]); 

Factory(Profession::class)->times(7)->create();

}


//Schema::enableForeignKeyConstraints(); no funciona
 


	}	