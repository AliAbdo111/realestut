<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
        'name' => 'Abanoub',
        'email' =>'abanoub@gmail.com',
        'password' => Hash::make('abanoub@gmail.com'),
            'age'=> '25',
            'mobile'=>  '01151196932',
            'address'=> 'Aswan',
            
            'isAdmin'=> 'Admin'
    ]);
    }
}
