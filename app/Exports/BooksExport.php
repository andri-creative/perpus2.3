<?php

namespace App\Exports;

use App\Models\Book;
use App\Models\BooksModel;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BooksExport implements FromQuery, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $month;
    protected $year;
    public function __construct($month, $year)

    {
        $this->month = $month;
        $this->year = $year;
    }

    public function query()
    {
        return BooksModel::query()
            ->select(
                'isbn_books',
                'judul_books',
                'author_books',
                'year_books',
                'publisher_books',
                'number_books',
                'categories.name_category',
                'racks.name_rack',
                'subs.code_sub'
            )
            ->join('per-b.categories as categories', 'books.id_category', '=', 'categories.id')
            ->join('per-b.racks as racks', 'books.id_rack', '=', 'racks.id')
            ->join('per-b.subs as subs', 'racks.id', '=', 'subs.rack_id')
            ->whereYear('books.created_at', $this->year)
            ->when($this->month, function ($query) {
                $query->whereMonth('books.created_at', $this->month);
            });
    }

    public function headings(): array
    {
        return [
            'ISBN',
            'Judul Buku',
            'Penulis',
            'Tahun',
            'Penerbit',
            'Jumlah Buku',
            'Kategori',
            'Rak',
            'Sub'
        ];
    }

}