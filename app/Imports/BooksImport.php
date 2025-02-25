<?php

namespace App\Imports;

use App\Models\Book;
use App\Models\SubModel;
use App\Models\RackModel;
use App\Models\BooksModel;
use Illuminate\Support\Str;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class BooksImport implements ToModel, WithHeadingRow, WithBatchInserts
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */


    public function batchSize(): int
    {
        return 100;
    }



    public function model(array $row)
    {
        // Cari kategori berdasarkan no_klasifikasi
        $bookCategoryCode = (string) $row['no_klasifikasi'];

        $category = CategoryModel::whereRaw(
            "CAST(SUBSTRING_INDEX(code_category, '-', 1) AS UNSIGNED) <= ? AND CAST(SUBSTRING_INDEX(code_category, '-', -1) AS UNSIGNED) >= ?",
            [$bookCategoryCode, $bookCategoryCode]
        )->first();

        // Cari rak berdasarkan kode_rak
        $rack = RackModel::where('code_rack', $row['kode_rak'])->first();

        // Jika kategori atau rak tidak ditemukan, abaikan baris
        if (!$category || !$rack) {
            Log::warning('Kategori atau Rak tidak ditemukan', ['row' => $row]);
            return null;
        }

        // Kembalikan model baru untuk disimpan
        $book =  [
            'id' => (string) Str::uuid(),
            'isbn_books' => $row['isbn'] ?? null,
            'judul_books' => $row['judul_buku'],
            'autor_books' => $row['penulis'],
            'year_books' => $row['tahun_terbit'],
            'publisher_books' => $row['penerbit'],
            'number_books' => $row['jumlah_buku'],
            'no_klasifikasi' => $row['no_klasifikasi'],
            'id_category' => $category->id,
            'id_rack' => $rack->id,
            'gambar' => $row['gambar_buku'] ?? 'default.jpg',
            'description' => $row['sinopsis'] ?? null,
        ];

        dd(json_encode($book));
    }
}
