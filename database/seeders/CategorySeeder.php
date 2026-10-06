<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Fiksi',
                'description' => 'Buku-buku fiksi seperti novel, cerpen, dan cerita fantasi.',
            ],
            [
                'name' => 'Non-Fiksi',
                'description' => 'Buku-buku non-fiksi seperti biografi, sejarah, dan sains.',
            ],
            [
                'name' => 'Teknologi',
                'description' => 'Buku-buku tentang teknologi, pemrograman, dan komputer.',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
