<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		
		DB::table('tipos')->insert([
			'nombre_tipo' => 'Audífonos',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
		
		DB::table('tipos')->insert([
			'nombre_tipo' => 'Cornetas',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
		
		DB::table('tipos')->insert([
			'nombre_tipo' => 'Disco Duro',
			'created_at' => now(),
			'updated_at' => now(),
		]);		
		
		DB::table('tipos')->insert([
			'nombre_tipo' => 'DVR',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
		DB::table('tipos')->insert([
			'nombre_tipo' => 'Impresora',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
		DB::table('tipos')->insert([
			'nombre_tipo' => 'Laptop',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
		DB::table('tipos')->insert([
			'nombre_tipo' => 'Micrófono',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
		DB::table('tipos')->insert([
			'nombre_tipo' => 'Monitor',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
        DB::table('tipos')->insert([
			'nombre_tipo' => 'PC',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
		DB::table('tipos')->insert([
			'nombre_tipo' => 'Ratón',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
		DB::table('tipos')->insert([
			'nombre_tipo' => 'Regulador',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
		DB::table('tipos')->insert([
			'nombre_tipo' => 'Router',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
		DB::table('tipos')->insert([
			'nombre_tipo' => 'Swich',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
		DB::table('tipos')->insert([
			'nombre_tipo' => 'Teclado',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
		DB::table('tipos')->insert([
			'nombre_tipo' => 'Teléfono',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
		DB::table('tipos')->insert([
			'nombre_tipo' => 'Unidad de CD',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
		DB::table('tipos')->insert([
			'nombre_tipo' => 'Unidad de DVD',
			'created_at' => now(),
			'updated_at' => now(),
		]);
    }
}
