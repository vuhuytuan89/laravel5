<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (($handle = fopen(__DIR__ . '/categories.csv', 'r')) !== false) {
            $row = 0;
            while(($data = fgetcsv($handle, 1000, ';')) !== false) {
                $row++;
                if ($row == 1) {
                    continue;
                } else {
                    DB::table('categories')->insert([
                        'parent_id' => $data[0],
                        'name' => $data[1],
                        'alias' => $data[2],
                        'desc' => $data[3],
                        'meta_title' => $data['1'],
                        'meta_desc' => $data['1'],
                        'meta_key' => $data['1'],
                        'created_at' => date('Y-m-d H:i:s')
                    ]);
                }
            }
            fclose($handle);
        }
    }
}
