<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('marcas')->insert([
			'nombre_marca' => 'Arawak',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
		DB::table('marcas')->insert([
			'nombre_marca' => 'ASUS',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
		DB::table('marcas')->insert([
			'nombre_marca' => 'BenQ',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
		DB::table('marcas')->insert([
			'nombre_marca' => 'Cisco',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
		DB::table('marcas')->insert([
			'nombre_marca' => 'Clon',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
        DB::table('marcas')->insert([
			'nombre_marca' => 'Dell',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
		DB::table('marcas')->insert([
			'nombre_marca' => 'Grandstream',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
		DB::table('marcas')->insert([
			'nombre_marca' => 'Genius',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
		DB::table('marcas')->insert([
			'nombre_marca' => 'HP',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		DB::table('marcas')->insert([
			'nombre_marca' => 'Integra',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
		DB::table('marcas')->insert([
			'nombre_marca' => 'Lenovo',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
		DB::table('marcas')->insert([
			'nombre_marca' => 'MikroTik',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
		DB::table('marcas')->insert([
			'nombre_marca' => 'My Book Live',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
		DB::table('marcas')->insert([
			'nombre_marca' => 'MyPBX',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		
		DB::table('marcas')->insert([
			'nombre_marca' => 'ZTE',
			'created_at' => now(),
			'updated_at' => now(),
		]);
    }
}
