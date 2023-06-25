<?php

namespace Database\Seeders;

use App\Models\Admin\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'FrontEnd',
            'Backend',
            'FullStack',
            'Design'
        ];

        foreach ($categories as $elem) {

            $new_category = new Category();
            $new_category->name = $elem;
            $new_category->slug = Str::slug($new_category->name);
            $new_category->save();
        }
    }
}
