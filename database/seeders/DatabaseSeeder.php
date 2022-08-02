<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

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
        $data = [
            'name' => 'phuong',
            'email' => 'phuong@gmail.com',
            'password' => bcrypt('123456'),   
        ];
        DB::table('users')->insert($data);

        $card = [
            'amount' => '0'
        ];
        DB::table('card')->insert($card);
    }
}
