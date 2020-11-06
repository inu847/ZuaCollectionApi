<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Adi Nugroho',
            'email' => 'adin72978@gmail.com',
            'password' => bcrypt('Semogaberkah'),
            'created_at' => now(),
            'updated_at' => now(),
            ]);
    }
}
