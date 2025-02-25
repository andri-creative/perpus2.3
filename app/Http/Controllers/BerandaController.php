<?php

namespace App\Http\Controllers;

use App\Models\BooksModel;
use App\Models\Borrow_DetailModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    public function indexBeranda()
    {
        $bukubaru = BooksModel::orderBy('created_at', 'desc')->take(10)->get();

        $bukuRekomendasi = BooksModel::whereHas('category', function($query) {
            $query->where('code_category', '400-499');
        })->latest()->take(2)
        ->union(
            BooksModel::whereHas('category', function ($query) {
                $query->where('code_category', '500-599');
            })->latest()->take(2)
        )
        ->union(
            BooksModel::whereHas('category', function($query) {
                $query->where('code_category', '800-899');
            })->latest()->take(8)
        )
        ->union(
            BooksModel::whereHas('category', function ($query) {
                $query->where('code_category', '900-999');
            })->latest()->take(2)
        )
        ->get();


        $bukuDipinjam = Borrow_DetailModel::select('book_id', DB::raw('COUNT(*) as total_dipinjam'))
            ->groupBy('book_id')
            ->orderByDesc('total_dipinjam')
            ->limit(10)
            ->with('books')
            ->get();

        return view('pages.beranda', compact('bukubaru', 'bukuRekomendasi' , 'bukuDipinjam'));
    }

}