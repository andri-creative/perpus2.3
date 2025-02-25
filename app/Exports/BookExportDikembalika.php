<?php

namespace App\Exports;

use App\Models\Borrow_DetailModel;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;

class BookExportDikembalika implements FromCollection, WithHeadings

{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $month;
    protected $year;

    public function __construct($month = null, $year = null)
    {
        $this->month = $month;
        $this->year = $year;
    }

    public function collection()
    {
        // Base query
        $query = Borrow_DetailModel::with(['books', 'books.category', 'books.rack', 'borrow', 'borrowedByUser', 'returnedByUser'])
            ->where('status', 'dikembalikan');

        // Apply month and year filtering
        if ($this->month && $this->year) {
            $query->whereMonth('return_date', $this->month)
                ->whereYear('return_date', $this->year);
        } elseif ($this->year) {
            $query->whereYear('return_date', $this->year);
        }

        // Map and return the data
        return $query->get()->map(function ($item) {
            return [
                'ISBN Buku' => $item->books->isbn_books ?? 'N/A',
                'Judul Buku' => $item->books->judul_books ?? 'N/A',
                'Kategori' => $item->books->category->name_category ?? 'N/A',
                'Rak Buku' => $item->books->rack->name_rack ?? 'N/A',
                'Dipinjam Oleh' => $item->borrow->name_borrow ?? 'N/A',
                'Identitas Peminjam' => $item->borrow->id_card ?? 'N/A',
                'Kelas' => $item->borrow->position_borrow ?? 'N/A',
                'User Peminjam' => $item->borrowedByUser->name ?? 'N/A',
                'User Pengembali' => $item->returnedByUser->name ?? 'N/A',
                'Tgl Pinjam' => $item->borrow_date ?? 'N/A',
                'Tgl Kembali' => $item->return_date ?? 'N/A',
                'Keterlambatan' => $item->keterlambatan ?? 'N/A',
                'Departemen' => $item->borrowedByUser->position ?? 'N/A',
                'Status' => $item->status ?? 'N/A',
                'Counter' => $item->counter ?? 'N/A',
            ];
        });
    }

    /**
     * Menentukan heading untuk file Excel
     * @return array
     */
    public function headings(): array
    {
        return [
            'ISBN Buku',
            'Judul Buku',
            'Kategori',
            'Rak Buku',
            'Dipinjam Oleh',
            'Identitas Peminjam',
            'Kelas',
            'User Peminjam',
            'User Pengembali',
            'Tgl Pinjam',
            'Tgl Kembali',
            'Keterlambatan',
            'Departemen',
            'Status',
            'Counter'
        ];
    }
}
