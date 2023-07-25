<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->delete();
        DB::table('brands')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'Apple',
                'slug' => 'apple',
                'logo' => '1689059790-1721842-apple.png',
                'banner' => NULL,
                'description' => 'This is Apple Brand',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => 1,
                'created_at' => '2023-07-11 07:16:30',
                'updated_at' => '2023-07-11 07:16:30',
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'Samsung',
                'slug' => 'samsung',
                'logo' => '1689059867-8298663-samsung.png',
                'banner' => NULL,
                'description' => 'This is samsung brand',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => 1,
                'created_at' => '2023-07-11 07:17:47',
                'updated_at' => '2023-07-11 07:17:47',
            ),
            2 =>
            array(
                'id' => 3,
                'name' => 'Huawei',
                'slug' => 'huawei',
                'logo' => '1689059933-1721842-huawei.png',
                'banner' => NULL,
                'description' => 'This is huawei brand',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => 1,
                'created_at' => '2023-07-11 07:18:53',
                'updated_at' => '2023-07-11 07:18:53',
            ),
            3 =>
            array(
                'id' => 4,
                'name' => 'Xiaomi',
                'slug' => 'xiaomi',
                'logo' => '1689060000-1721842-xiaomi.png',
                'banner' => NULL,
                'description' => 'This is xiaomi brand',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => 1,
                'created_at' => '2023-07-11 07:19:59',
                'updated_at' => '2023-07-11 07:19:59',
            ),
            4 =>
            array(
                'id' => 5,
                'name' => 'Oppo',
                'slug' => 'oppo',
                'logo' => '1689060066-1721842-oppo.png',
                'banner' => NULL,
                'description' => 'This is oppo brand',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => 1,
                'created_at' => '2023-07-11 07:21:06',
                'updated_at' => '2023-07-11 07:21:06',
            ),
            5 =>
            array(
                'id' => 6,
                'name' => 'Vivo',
                'slug' => 'vivo',
                'logo' => '1689060133-1721842-vivo.png',
                'banner' => NULL,
                'description' => 'This is vivo brand',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => 1,
                'created_at' => '2023-07-11 07:22:13',
                'updated_at' => '2023-07-11 07:22:13',
            ),
            6 =>
            array(
                'id' => 7,
                'name' => 'Realme',
                'slug' => 'realme',
                'logo' => '1689060200-1721842-realme.png',
                'banner' => NULL,
                'description' => 'This is realme brand',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => 1,
                'created_at' => '2023-07-11 07:23:20',
                'updated_at' => '2023-07-11 07:23:20',
            ),
            7 =>
            array(
                'id' => 8,
                'name' => 'OnePlus',
                'slug' => 'oneplus',
                'logo' => '1689060266-1721842-oneplus.png',
                'banner' => NULL,
                'description' => 'This is oneplus brand',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => 1,
                'created_at' => '2023-07-11 07:24:26',
                'updated_at' => '2023-07-11 07:24:26',
            ),
            8 =>
            array(
                'id' => 9,
                'name' => 'Nokia',
                'slug' => 'nokia',
                'logo' => '1689060333-1721842-nokia.png',
                'banner' => NULL,
                'description' => 'This is nokia brand',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => 1,
                'created_at' => '2023-07-11 07:25:33',
                'updated_at' => '2023-07-11 07:25:33',
            ),
            9 =>
            array(
                'id' => 10,
                'name' => 'Sony',
                'slug' => 'sony',
                'logo' => '1689060400-1721842-sony.png',
                'banner' => NULL,
                'description' => 'This is sony brand',
                'created_by' => 1,
                'updated_by' => 1,
                'status' => 1,
                'created_at' => '2023-07-11 07:26:40',
                'updated_at' => '2023-07-11 07:26:40',
            ),
            10 =>
            array(
                'id' => 11,
                'name' => 'LG',
                'slug' => 'lg',
                'logo' => '1689060466-1721842-lg.png',
                'banner' => NULL,
                'description' => 'This is lg brand',
                'created_by' => 1,
                'updated_by' => 1,
                'status' => 1,
                'created_at' => '2023-07-11 07:27:46',
                'updated_at' => '2023-07-11 07:27:46',
            ),
        ));
    }
}
