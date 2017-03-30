<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call('ImagesTableSeeder');
		$this->call('CarTableSeeder');
		$this->call('ColorTableSeeder');
		$this->call('CarColorTableSeeder');
    }
}

/**
* 
*/
class ImagesTableSeeder extends Seeder
{
	public function run() 
	{
		DB::table('images')->insert([
			['name' => "Hinh_quan1.png", 'product_id' => 2],
			['name' => "Hinh_quan2.png", 'product_id' => 2],
			['name' => "Hinh_quan3.png", 'product_id' => 3],
			['name' => "Hinh_quan4.png", 'product_id' => 3]
			]);
	}
}

class CarTableSeeder extends Seeder
{
	public function run() 
	{
		DB::table('cars')->insert([
			['name' => "BMW", 'price' => 1000],
			['name' => "Audi", 'price' => 2000],
			['name' => "Honda", 'price' => 1000],
			['name' => "Samsung", 'price' => 3000],
			['name' => "Mazada", 'price' => 4000]
			]);
	}
}
class ColorTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('colors')->insert([
			['name' => 'red'],
			['name' => 'green'],
			['name' => 'black'],
			['name' => 'white']
		]);
	}
}
class CarColorTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('car_colors')->insert([
			['car_id' => 1, 'color_id' => 1],
			['car_id' => 2, 'color_id' => 1],
			['car_id' => 3, 'color_id' => 2],
			['car_id' => 4, 'color_id' => 3],
			['car_id' => 5, 'color_id' => 4],
		]);
	}
}