<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('colors')->delete();
        
        \DB::table('colors')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Black',
                'code' => '#0D0D0E',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => NULL,
                'created_at' => '2023-07-11 07:08:05',
                'updated_at' => '2023-07-11 07:08:05',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Red',
                'code' => '#E91648',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => NULL,
                'created_at' => '2023-07-11 07:08:17',
                'updated_at' => '2023-07-11 07:08:17',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Blue',
                'code' => '#0080FF',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => NULL,
                'created_at' => '2023-07-11 07:08:44',
                'updated_at' => '2023-07-11 07:08:44',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Green',
                'code' => '#24C609',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => NULL,
                'created_at' => '2023-07-11 07:09:30',
                'updated_at' => '2023-07-11 07:09:30',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Yollow',
                'code' => '#FFFF00',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => NULL,
                'created_at' => '2023-07-11 07:09:49',
                'updated_at' => '2023-07-11 07:09:49',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Purple',
                'code' => '#CB04ED',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => NULL,
                'created_at' => '2023-07-11 07:10:20',
                'updated_at' => '2023-07-11 07:10:20',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'White',
                'code' => '#FFFFFF',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => NULL,
                'created_at' => '2023-07-11 07:11:39',
                'updated_at' => '2023-07-11 07:11:39',
            ),
        ));
        
        
    }
}