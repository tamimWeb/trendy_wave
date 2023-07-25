<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 3,
                'name' => 'Phones',
                'slug' => 'phones',
                'icon' => '1688804129-287977-phones.png',
                'description' => 'All kind of mobile phones',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => 1,
                'created_at' => '2023-07-08 08:15:29',
                'updated_at' => '2023-07-08 08:15:29',
            ),
            1 => 
            array (
                'id' => 4,
                'name' => 'Computers',
                'slug' => 'computers',
                'icon' => '1688804243-6749874-computers.png',
                'description' => 'Computer accessories. Like motherboard, ram, hard disk, monitor etc',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => 1,
                'created_at' => '2023-07-08 08:17:23',
                'updated_at' => '2023-07-08 08:17:23',
            ),
            2 => 
            array (
                'id' => 5,
                'name' => 'Accessories',
                'slug' => 'accessories',
                'icon' => '1688804292-9050144-accessories.png',
                'description' => 'Headphone, gaming accessories etc',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => 1,
                'created_at' => '2023-07-08 08:18:12',
                'updated_at' => '2023-07-08 08:18:12',
            ),
            3 => 
            array (
                'id' => 6,
                'name' => 'Laptops',
                'slug' => 'laptops',
                'icon' => '1688804416-6982570-laptops.png',
                'description' => 'All kind of laptops',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => 1,
                'created_at' => '2023-07-08 08:20:16',
                'updated_at' => '2023-07-08 08:20:16',
            ),
            4 => 
            array (
                'id' => 7,
                'name' => 'Monitors',
                'slug' => 'monitors',
                'icon' => '1688804453-7096922-monitors.png',
                'description' => 'This is monitor category',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => 1,
                'created_at' => '2023-07-08 08:20:53',
                'updated_at' => '2023-07-08 08:20:53',
            ),
            5 => 
            array (
                'id' => 8,
                'name' => 'Networking',
                'slug' => 'networking',
                'icon' => '1688806193-8256941-networking.png',
                'description' => 'All networking devices are here',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => 1,
                'created_at' => '2023-07-08 08:49:53',
                'updated_at' => '2023-07-08 08:49:53',
            ),
            6 => 
            array (
                'id' => 9,
                'name' => 'PC Gaming',
                'slug' => 'pc-gaming',
                'icon' => '1688806265-8248517-pc-gaming.png',
                'description' => 'Gaming Accessories',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => 1,
                'created_at' => '2023-07-08 08:51:05',
                'updated_at' => '2023-07-08 08:51:05',
            ),
            7 => 
            array (
                'id' => 10,
                'name' => 'Smartwatches',
                'slug' => 'smartwatches',
                'icon' => '1688806304-8166959-smartwatches.png',
                'description' => 'Smartwatches',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => 1,
                'created_at' => '2023-07-08 08:51:44',
                'updated_at' => '2023-07-08 08:51:44',
            ),
            8 => 
            array (
                'id' => 11,
                'name' => 'Headphones',
                'slug' => 'headphones',
                'icon' => '1688807295-523121-headphones.png',
                'description' => 'Razer, Havit, etc',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => 1,
                'created_at' => '2023-07-08 09:08:15',
                'updated_at' => '2023-07-08 09:08:15',
            ),
            9 => 
            array (
                'id' => 12,
                'name' => 'Camera & Photo',
                'slug' => 'camera-photo',
                'icon' => '1688807325-3236245-camera-photo.png',
                'description' => 'Camera & Photo',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => 1,
                'created_at' => '2023-07-08 09:08:45',
                'updated_at' => '2023-07-08 09:08:45',
            ),
            10 => 
            array (
                'id' => 13,
                'name' => 'Video Games',
                'slug' => 'video-games',
                'icon' => '1688807355-2618600-video-games.png',
                'description' => 'Video Games',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => 1,
                'created_at' => '2023-07-08 09:09:15',
                'updated_at' => '2023-07-08 09:09:15',
            ),
            11 => 
            array (
                'id' => 14,
                'name' => 'Sports',
                'slug' => 'sports',
                'icon' => '1688807382-4810600-sports.png',
                'description' => 'Sports',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => 1,
                'created_at' => '2023-07-08 09:09:42',
                'updated_at' => '2023-07-08 09:09:42',
            ),
        ));
        
        
    }
}