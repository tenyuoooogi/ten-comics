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
      


$array = [['A','1'],['B','2'],['C','3'],['D','3'],['E','1'],['F','3'],['G','3'],['H','4'],
['I','4'],['J','2'],['K','1'],['L','3'],['M','4'],['N','2'],['O','1'],];


       foreach($array as $vals){
        Product::Create([
            'name' => $vals[0],
            'category_id' => $vals[1],
        ]);
       }


    }
    }