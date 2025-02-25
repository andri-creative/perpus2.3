<?php

namespace App\Http\Controllers;

use App\Models\RackModel;
use App\Models\BooksModel;
use App\Imports\BooksImport;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\Log;
use App\Exports\TemplateBooksExport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    // Books import
    public function Import_Books(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        $path = $request->file('file')->getRealPath();
        $data = Excel::toCollection(null, $path)->toArray();


        if (!empty($data) && !empty($data[0])) {
            $rows = $data[0];

            if (count($rows) < 100) {
                return back()->with('error', 'File Excel harus berisi tepat 100 data!');
            }

            $header = array_shift($rows);

            $rows = array_slice($rows, 0, 100);

            $formattedData = array_map(function ($row) use ($header) {
                return array_combine($header, $row);
            }, $rows);

            $duplicateISBNs = [];
            $savedISBNs = [];

            $result = array_map(function ($row) {
                // $bookCategoryCode = (string) $row['NO KLASIFIKASI'];
                $bookCategoryCode = (int)$row['NO KLASIFIKASI'];

                $category = CategoryModel::whereRaw(
                    "CAST(SUBSTRING_INDEX(code_category, '-', 1) AS UNSIGNED) <= ?
                     AND CAST(SUBSTRING_INDEX(code_category, '-', -1) AS UNSIGNED) >= ?",
                    [$bookCategoryCode, $bookCategoryCode]
                )->first();

                $rack = RackModel::where('code_rack', $row['KODE RAK'])->first();

                $categoryId = $category ? $category->id : null;
                $rackId = $rack ? $rack->id : null;

                return [
                    'isbn_books'      => $row['ISBN'] ?? null,
                    'autor_books'     => $row['PENULIS'] ?? null,
                    'year_books'      => $row['TAHUN TERBIT'] ?? null,
                    'judul_books'     => $row['JUDUL BUKU'] ?? null,
                    'publisher_books' => $row['PENERBIT'] ?? null,
                    'number_books'    => $row['JUMLAH BUKU'] ?? null,
                    'id_category'     => $categoryId,
                    'id_rack'         => $rackId,
                    'gambar'          => $row['GAMBAR BUKU'] ?? 'default.jpg',
                    'description'     => $row['SINOPSIS'] ?? null,
                    'no_klasifikasi' => $row['NO KLASIFIKASI'] ?? null,
                ];
            }, $formattedData);

            // return response()->json($result);

            foreach ($result as $bookData) {
                $existingBook = BooksModel::where('isbn_books', $bookData['isbn_books'])->first();

                if ($existingBook) {
                    $duplicateISBNs[] = $bookData['isbn_books'];
                } else {
                    BooksModel::updateOrCreate(
                        ['isbn_books' => $bookData['isbn_books']],
                        $bookData
                    );
                    $savedISBNs[] = $bookData['isbn_books'];
                }
            }

            // $message = count($duplicateISBNs);

            return back()->with('success',  'Import Data Buku berhasil disimpan');
        }
        return back()->with('error', 'Data tidak valid atau file kosong.');
    }



    // Templade book download
    public function downloadTemplate()
    {
        // Nama file template
        $fileName = 'Template_Books.xlsx';

        // Mengembalikan file Excel untuk diunduh
        return Excel::download(new TemplateBooksExport, $fileName);
    }
}