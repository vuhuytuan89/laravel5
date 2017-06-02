<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'TuanVH',
            'email' => 'vuhuytuan89@gmail.com',
            'password' => hash::make('123456'),
            'level' => '1',
            'status' => '1',
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
