<?php

namespace App\Http\Controllers;
use DateTime;

use App\Exports\BooksExport;
use Illuminate\Http\Request;
use App\Exports\BorrowDetailExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BookExportDikembalika;

class ExportController extends Controller
{
    public function exportReturnedBooks(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

        // Generate dynamic filename
        $monthName = $month ? DateTime::createFromFormat('!m', $month)->format('F') : 'Semua-Bulan';
        $filename = 'buku_sudah_dikembalikan_' . $monthName . '_' . ($year ?? 'Semua-Tahun') . '.xlsx';

        return Excel::download(new BookExportDikembalika($month, $year), $filename);
    }



    public function Index_export()
    {
        $user = Auth::user();
        return view('dashboard.pages.export', compact('user'));
    }

    public function exportBooks(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

        if (!$year) {
            return redirect()->back()->with('error', 'Tahun wajib diisi!');
        }

        return Excel::download(new BooksExport($month, $year), "books_{$month}_{$year}.xlsx");
    }

    public function exportExcel(Request $request)
    {
        $request->validate([
            'month' => 'required|numeric|min:1|max:12',
            'year' => 'required|numeric|min:2000|max:' . now()->year,
        ]);

        $month = $request->input('month');
        $year = $request->input('year');

        // Dapatkan data user yang sedang login
        $user = Auth::user();

        // Nama file Excel
        $fileName = "Borrow_Details_{$year}_{$month}_by_{$user->name}.xlsx";

        // Jalankan ekspor, sekarang dengan informasi pengguna
        return Excel::download(new BorrowDetailExport($month, $year, $user), $fileName);
    }
}
