<?php

use Illuminate\Database\Seeder;

class UbicacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('ubicacions')->insert([
			'nombre_ubicacion' => 'Administración',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
		DB::table('ubicacions')->insert([
			'nombre_ubicacion' => 'Gerencia',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
		DB::table('ubicacions')->insert([
			'nombre_ubicacion' => 'Planta',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
		DB::table('ubicacions')->insert([
			'nombre_ubicacion' => 'Presidencia',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
		DB::table('ubicacions')->insert([
			'nombre_ubicacion' => 'RRHH',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
		DB::table('ubicacions')->insert([
			'nombre_ubicacion' => 'Ventas',
			'created_at' => now(),
			'updated_at' => now(),
		]);
    }
}
