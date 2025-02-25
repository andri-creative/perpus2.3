<?php

namespace Database\Seeders;

use App\Models\BooksModel;
use App\Models\CategoryModel;
use App\Models\RackModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {


        $books = [
            [
                'isbn_books' => '602711404-5',
                'judul_books' => 'Bu Guru Funky',
                'autor_books' => '@bugurufunky',
                'year_books' => 2015,
                'publisher_books' => 'Rak Buku',
                'city_books' => 'Jakarta',
                'number_books' => 1,
                'kode_kategori' => '899.3/Fun/B',
                'kode_rack' => 'R001',
                'gambar' => 'Sampul Anak Rantau.jpeg',
                'description' => 'aysa'
            ],
            [
                'isbn_books' => '978-602-60514-9-3',
                'judul_books' => 'Anak Rantau',
                'autor_books' => 'A. Fuadi',
                'year_books' => 2017,
                'publisher_books' => 'PT. Falcon',
                'city_books' => 'Jakarta',
                'number_books' => 2,
                'kode_kategori' => '899.3/Fua/A',
                'kode_rack' => 'R001',
                'gambar' => 'Sampul Anak Rantau.jpeg',
                'description' => 'aysa'
            ],
            [
                'isbn_books' => '978-979-22-8004-3',
                'judul_books' => 'Negeri 5 Menara',
                'autor_books' => 'A. Fuadi',
                'year_books' => 2009,
                'publisher_books' => 'PT. Gramedia Pustaka Utama',
                'city_books' => 'Jakarta',
                'number_books' => 2,
                'kode_kategori' => '899.3/Fua/N',
                'kode_rack' => 'R001',
                'gambar' => 'Sampul Negeri 5 Menara.jpg',
                'description' => 'aysa'
            ],
            [
                'isbn_books' => '978-602-7888-41-8',
                'judul_books' => 'Berjuang di Tanah Rantau',
                'autor_books' => 'A. Fuadi',
                'year_books' => 2013,
                'publisher_books' => 'Bentang',
                'city_books' => 'Yogyakarta',
                'number_books' => 1,
                'kode_kategori' => '899.3/Fua/B',
                'kode_rack' => 'R001',
                'gambar' => 'Sampul Berjuang di Tanah Rantau.png',
                'description' => 'aysa'
            ],
            [
                'isbn_books' => '978-602-291-488-4',
                'judul_books' => 'Cinta dalam Ikhlas',
                'autor_books' => 'Abay Adhitya',
                'year_books' => 2019,
                'publisher_books' => 'Penerbit Bunyan',
                'city_books' => 'Yogyakarta',
                'number_books' => 2,
                'kode_kategori' => '899.3/Aba/C',
                'kode_rack' => 'R001',
                'gambar' => 'Sampul Cinta dalam Ikhlas.avif',
                'description' => 'aysa'
            ],
            [
                'isbn_books' => '979-407-064-5',
                'judul_books' => 'Salah Asuhan',
                'autor_books' => 'Abdoel Moeis',
                'year_books' => 2002,
                'publisher_books' => 'Balai Pustaka',
                'city_books' => 'Jakarta',
                'number_books' => 2,
                'kode_kategori' => '899.3/Moe/S',
                'kode_rack' => 'R001',
                'gambar' => 'Sampul Salah Asuhan.png',
                'description' => 'aysa'
            ],
            [
                'isbn_books' => '978-979-22-8421-8',
                'judul_books' => 'Penunggu Jenazah',
                'autor_books' => 'Abdullah Harahap',
                'year_books' => 2011,
                'publisher_books' => 'PT. Gramedia Pustaka Utama',
                'city_books' => 'Jakarta',
                'number_books' => 1,
                'kode_kategori' => '899.3/Abd/P',
                'kode_rack' => 'R001',
                'gambar' => 'Sampul Penunggu Jenazah.png',
                'description' => 'aysa'
            ],
            [
                'isbn_books' => '978-602-242-320-1',
                'judul_books' => 'KKPK Hidden, Gadis Tersembunyi',
                'autor_books' => 'Abdurrahman Aufa Liamrillah',
                'year_books' => 2014,
                'publisher_books' => 'PT. Mizan Pustaka',
                'city_books' => 'Bandung',
                'number_books' => 1,
                'kode_kategori' => '899.3/Auf/H',
                'kode_rack' => 'R001',
                'gambar' => 'Sampul KKPK Hidden, Gadis Tersembunyi.jpg',
                'description' => 'aysa'
            ]
            // Tambahkan data buku lainnya dengan format serupa
        ];



        foreach ($books as $book) {
            $bookCategoryCode = (int)$book['kode_kategori'];

            $category = CategoryModel::whereRaw(
                "CAST(SUBSTRING_INDEX(code_category, '-', 1) AS UNSIGNED) <= ? AND CAST(SUBSTRING_INDEX(code_category, '-', -1) AS UNSIGNED) >= ?",
                [$bookCategoryCode, $bookCategoryCode]
            )->first();

            $racks = RackModel::where('code_rack', $book['kode_rack'])->first();

            if (!$category) {
                continue;
            }

            BooksModel::create([
                'isbn_books' => $book['isbn_books'],
                'judul_books' => $book['judul_books'],
                'autor_books' => $book['autor_books'],
                'year_books' => $book['year_books'],
                'publisher_books' => $book['publisher_books'],
                'number_books' => $book['number_books'],
                'no_klasifikasi' => $book['kode_kategori'],
                'id_category' => $category->id,
                'id_rack' => $racks->id,
                'gambar' => $book['gambar'],
                'description' => $book['description']
            ]);
        }
    }
}
