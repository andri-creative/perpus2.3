<?php

namespace Database\Seeders;

use App\Models\BooksModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'isbn_books' => '9783161484100',
                'judul_books' => 'Belajar Laravel',
                'autor_books' => 'John Doe',
                'year_books' => 2023,
                'publisher_books' => 'Penerbit ABC',
                'number_books' => '8',
                'id_category' => null,
                'id_rack' => null,     // Sesuaikan dengan id_rack yang ada di tabel racks
                'name_rack' => 'Pengantar Laravel',
            ],
            [
                'isbn_books' => '9781234567890',
                'judul_books' => 'Panduan PHP untuk Pemula',
                'autor_books' => 'Jane Smith',
                'year_books' => 2022,
                'publisher_books' => 'Penerbit XYZ',
                'number_books' => '20',
                'id_category' => null,
                'id_rack' => null,
                'name_rack' => 'Dasar-dasar PHP',
            ],
            [
                'isbn_books' => '9780123456789',
                'judul_books' => 'JavaScript untuk Semua',
                'autor_books' => 'Alice Johnson',
                'year_books' => 2021,
                'publisher_books' => 'Penerbit QRS',
                'number_books' => '30',
                'id_category' => null,
                'id_rack' => null,
                'name_rack' => 'Belajar JavaScript dari Nol',
            ],
            [
                'isbn_books' => '9780143123481',
                'judul_books' => 'Framework Laravel Lanjut',
                'autor_books' => 'Bob Brown',
                'year_books' => 2024,
                'publisher_books' => 'Penerbit DEF',
                'number_books' => '43',
                'id_category' => null,
                'id_rack' => null,
                'name_rack' => 'Mengembangkan Aplikasi Web dengan Laravel',
            ],
            [
                'isbn_books' => '9781112345670',
                'judul_books' => 'Membangun API dengan Laravel',
                'autor_books' => 'Charlie Green',
                'year_books' => 2023,
                'publisher_books' => 'Penerbit GHI',
                'number_books' => '25',
                'id_category' => null,
                'id_rack' => null,
                'name_rack' => 'Panduan Praktis API RESTful',
            ],
        ];
        foreach ($books as $book) {
            BooksModel::create($book);
        }
    }
}