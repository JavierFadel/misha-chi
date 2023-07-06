<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 10; $i++) { 
            DB::table('product')->insert([
                'name' => 'Comic  ' . $i,
                'price' =>  ceil(mt_rand(40000, 200000)),
                'image' => 'resources/image/comic-' . $i . '.jpg'
            ]);       
        }

        for ($i=0; $i < 3; $i++) { 
            DB::table('product')->insert([
                'name' => 'Figure  ' . $i,
                'price' =>  ceil(mt_rand(40000, 200000)),
                'image' => 'resources/image/figure-' . $i . '.jpg'
            ]);
        }
    }
}
