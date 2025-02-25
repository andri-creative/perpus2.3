<?php

namespace App\Exports;

use App\Models\PengunjungModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PengunjungExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PengunjungModel::select('first_name', 'last_name', 'day', 'date_time', 'kelas', 'keperluan')->get();
    }
    public function headings(): array
    {
        return ['First Name', 'Last Name', 'Day', 'Date Time', 'Kelas', 'Keperluan'];
    }
}
