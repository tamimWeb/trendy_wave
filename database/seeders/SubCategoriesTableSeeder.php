<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sub_categories')->delete();
        
        \DB::table('sub_categories')->insert(array (
            0 => 
            array (
                'id' => 2,
                'category_id' => 3,
                'name' => 'Smart Phone',
                'slug' => 'smart-phone',
                'icon' => '1688814086-4134236-iphone-11.jpeg',
                'description' => 'Smart phone description',
                'created_by' => 1,
                'updated_by' => 1,
                'status' => 1,
                'created_at' => '2023-07-08 10:53:29',
                'updated_at' => '2023-07-11 07:14:25',
            ),
            1 => 
            array (
                'id' => 3,
                'category_id' => 4,
                'name' => 'Laptop',
                'slug' => 'laptop',
                'icon' => '1688814181-2738758-hp-pavilon-gamming-series.jpg',
                'description' => 'This is Laptop subcategory description',
                'created_by' => 1,
                'updated_by' => 1,
                'status' => 1,
                'created_at' => '2023-07-08 11:00:47',
                'updated_at' => '2023-07-11 07:14:57',
            ),
        ));
        
        
    }
}