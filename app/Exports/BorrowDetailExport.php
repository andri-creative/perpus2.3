<?php

namespace App\Exports;

use App\Models\Borrow_DetailModel;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class BorrowDetailExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $month;
    protected $year;
    protected $user;

    public function __construct($month, $year, $user)
    {
        $this->month = $month;
        $this->year = $year;
        $this->user = $user;
    }

    public function view(): View
    {
        $list_detail = Borrow_DetailModel::with(['books', 'borrow'])
            ->whereYear('borrow_date', $this->year)
            ->whereMonth('borrow_date', $this->month)
            ->get();

        return view('dashboard.pages.export', [
            'list_detail' => $list_detail,
            'user' => $this->user,
        ]);
    }

    // public function collection()
    // {
    //     return Borrow_DetailModel::all();
    // }
}
