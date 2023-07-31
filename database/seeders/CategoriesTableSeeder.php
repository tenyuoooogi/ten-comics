<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $major_category_names = [
            '男性向け', '女性向け', '大人向け','子供向け'
        ];

        $man_categories = [
            'A','B','C','D','E','F','G'
        ];

        $woman_categories = [
            'H','I','J','K','L','M','N'
        ];

        $adult_categories = [
            'O', 'P','Q','R','S','T','U' 
        ];

        $child_categories = [
            'V', 'W', 'X','Y','Z' 
        ];

        foreach ($major_category_names as $major_category_name) {
            if ( $major_category_name == '男性向け') {
                foreach ($man_caregories as $man_category) {
                    Category::create([
                        'name' => $man_category,
                        'description' => $man_category,
                        'major_category_name' => $major_category_name
                    ]);
                }
            }

            if ( $major_category_name == '女性向け') {
                foreach ($woman_categories as $woman_category) {
                    Category::create([
                        'name' => $woman_category,
                        'description' => $woman_category,
                        'major_category_name' => $major_category_name
                    ]);
                }
            }

            if ( $major_category_name == '大人向け') {
                foreach ($adult_categories as $adult_category) {
                    Category::create([
                        'name' => $adult_category,
                        'description' => $adult_category,
                        'major_category_name' => $major_category_name
                        
                        
                    ]);
                }
            }

            if ( $major_category_name == '子供向け') {
                foreach ($child_categories as $child_category) {
                    Category::create([
                        'name' => $child_category,
                        'description' => $child_category,
                        'major_category_name' => $major_category_name
                       
                        
                    ]);
                }
            }





        }

    }
}
