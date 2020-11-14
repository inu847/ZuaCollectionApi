<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BajuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $baju = [];
        $faker = Faker::create();
        for($i=0;$i<15;$i++){
            // $avatar_path = 'public/storages/avatars';
            $avatar_fullpath = $faker->image( $avatar_path, 200, 250, 'people', true, true, 'people');
            $avatar = str_replace($avatar_path . '/' , '', $avatar_fullpath);
            $baju[$i] = [
                'title' => $faker->name,
                // 'avatar' => $avatar,
                'status' => 'PROCESS',
                'kategori' => 'Atasan Wanita',
                'jenis_ukuran' => 'Ukuran Badan',
                'lingkar_badan' =>  mt_rand(20, 90),
                'lingkar_pinggang' =>  mt_rand(20, 90),
                'lingkar_pinggul' =>  mt_rand(20, 90),
                'lebar_muka' =>  mt_rand(20, 90),
                'lebar_punggung' =>  mt_rand(20, 90),
                'panjang_punggung' =>  mt_rand(20, 90),
                'panjang_muka' =>  mt_rand(20, 90),
                'panjang_baju' =>  mt_rand(20, 90),
                'panjang_lengan' =>  mt_rand(20, 90),
                'lebar_lengan' =>  mt_rand(20, 90),
                'panjang_rok' =>  mt_rand(20, 90),
                'panjang_celana' =>  mt_rand(20, 90),
                'lingkar_pipa' =>  mt_rand(20, 90),
                'lingkar_paha' =>  mt_rand(20, 90),
                'lingkar_lutut' =>  mt_rand(20, 90),
                'panjang_krah' =>  mt_rand(20, 90),
                'lebar_ban_lengan' =>  mt_rand(20, 90),                
                'created_at' => now(),
                ];
        }
        DB::table('bajus')->insert($baju);
    }
}
