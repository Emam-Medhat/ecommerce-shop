<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // Main categories and their subcategories
        $mainCategories = [
            'Electronics' => ['Laptops', 'Mobile Phones', 'Headphones', 'Monitors', 'Cameras'],
            'Clothing' => ['Men', 'Women', 'Kids'],
            'Books' => ['Novels', 'Educational Books', 'Religious Books', 'Self-Development Books'],
            'Home Appliances' => ['Kitchen', 'Cleaning', 'Decor', 'Lighting'],
            'Games' => ['Video Games', 'Kids Games', 'Educational Games'],
        ];

        foreach ($mainCategories as $main => $subCategories) {
            // Create main category
            $parent = Category::create([
                'name' => $main,
                'slug' => Str::slug($main),
                'parent_id' => null
            ]);

            // Create subcategories for the main category
            foreach ($subCategories as $sub) {
                Category::create([
                    'name' => $sub,
                    'slug' => Str::slug($sub),
                    'parent_id' => $parent->id
                ]);
            }
        }
    }
}
