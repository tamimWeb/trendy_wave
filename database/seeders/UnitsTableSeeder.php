<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('units')->delete();
        DB::table('units')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'Dozzon',
                'description' => 'One dozzon equals 12 product',
                'created_by' => 1,
                'updated_by' => 1,
                'status' => 0,
                'created_at' => '2023-07-08 12:08:44',
                'updated_at' => '2023-07-08 12:15:41',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Per Piece',
                'description' => 'User can by product by piece',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => 1,
                'created_at' => '2023-07-08 12:14:39',
                'updated_at' => '2023-07-08 12:14:39',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Per Lot',
                'description' => 'per lot means all product in a lot',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => 1,
                'created_at' => '2023-07-08 12:15:32',
                'updated_at' => '2023-07-08 12:15:40',
            ),
        ));
        
        
    }
}