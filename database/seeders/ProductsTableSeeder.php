<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Database\Seeders\DB;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mangas = [
            'A','B','C','D','E','F','G','H','I','J','K','L'
        ];
        
        foreach ($mangas as $manga){
            Product::create([
                'name' => $manga,
              
                
            ]);
        }
    }
}
