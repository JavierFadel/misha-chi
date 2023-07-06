<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        for ($i=0; $i < 10; $i++) { 
            DB::table('product')->insert([
                'name' => 'Product ' . $i,
                'price' =>  floor(mt_rand(40000, 200000)),
                'image' => 'resources/image/product-' . $i . '.jpg'
            ]);   
        }
    }
}
