<?php

namespace Database\Seeders;

use App\Models\CategoryModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['code_category' => '000-099', 'name_category' => 'Bidang Umum'],
            ['code_category' => '100-199', 'name_category' => 'Psikologi/Filosofi'],
            ['code_category' => '200-299', 'name_category' => 'Agama'],
            ['code_category' => '300-399', 'name_category' => 'Bidang Sosial'],
            ['code_category' => '400-499', 'name_category' => 'Bahasa'],
            ['code_category' => '500-599', 'name_category' => 'Ilmu Alam'],
            ['code_category' => '600-699', 'name_category' => 'Ilmu Terapan'],
            ['code_category' => '700-799', 'name_category' => 'Seni dan Rekreasi'],
            ['code_category' => '800-899', 'name_category' => 'Sastra dan Literatur'],
            ['code_category' => '900-999', 'name_category' => 'Sejarah dan Geografi'],
        ];
        foreach ($categories as $category) {
            CategoryModel::create($category);
        }
    }
}