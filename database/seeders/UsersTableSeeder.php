<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role' => 'admin',
                'name' => 'Emon Admin',
                'email' => 'admin@hsblco.com',
                'phone' => '01638849305',
                'address' => NULL,
                'password' => '$2y$10$GmzVi3YKGW0egPyldF1SdOF1MeYwXiGcYptEXwgbUnPDCegK.fMB6',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'photo' => NULL,
                'created_at' => '2023-06-25 09:54:53',
                'updated_at' => '2023-06-25 09:54:53',
            ),
            1 => 
            array (
                'id' => 2,
                'role' => 'customer',
                'name' => 'Emon Customer',
                'email' => 'customer@hsblco.com',
                'phone' => '01521437220',
                'address' => NULL,
                'password' => '$2y$10$poQOyezQE1BBHIug8d0ituIE4h0N49w4BE4w3iKm5JEnVjtuy6uy6',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'photo' => NULL,
                'created_at' => '2023-06-25 10:14:57',
                'updated_at' => '2023-06-25 10:14:57',
            ),
        ));
        
        
    }
}