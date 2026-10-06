<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'category_id' => 1,
                'title' => 'Laskar Pelangi',
                'author' => 'Andrea Hirata',
                'publisher' => 'Bentang Pustaka',
                'year' => 2005,
                'stock' => 10,
            ],
            [
                'category_id' => 1,
                'title' => 'Bumi Manusia',
                'author' => 'Pramoedya Ananta Toer',
                'publisher' => 'Hasta Mitra',
                'year' => 1980,
                'stock' => 7,
            ],
            [
                'category_id' => 2,
                'title' => 'Sapiens: A Brief History of Humankind',
                'author' => 'Yuval Noah Harari',
                'publisher' => 'Harper',
                'year' => 2011,
                'stock' => 5,
            ],
            [
                'category_id' => 2,
                'title' => 'Filosofi Teras',
                'author' => 'Henry Manampiring',
                'publisher' => 'Kompas',
                'year' => 2018,
                'stock' => 12,
            ],
            [
                'category_id' => 3,
                'title' => 'Clean Code',
                'author' => 'Robert C. Martin',
                'publisher' => 'Prentice Hall',
                'year' => 2008,
                'stock' => 8,
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
