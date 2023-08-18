<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use database\seeders\ProductsTableSeeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_names = [
            '男性向け', '女性向け', '大人向け','子供向け'
        ];

       
      
           
                foreach ($category_names as $category_name) {
                    Category::create([
                        
                        'name'=> $category_name,
                    ]);
            }

    }

}