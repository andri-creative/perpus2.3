<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TemplateBooksExport implements WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            "ISBN",
            "JUDUL BUKU",
            "KOTA TERBIT",
            "PENERBIT",
            "NO KLASIFIKASI",
            "JUMLAH BUKU",
            "KODE RAK",
            "GAMBAR BUKU",
            "SINOPSIS"
        ];
    }
}
