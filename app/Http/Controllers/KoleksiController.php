<?php
namespace App\Http\Controllers;

use App\Models\BooksModel;
use App\Models\CategoryModel;
use App\Models\PengunjungModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KoleksiController extends Controller
{
    public function indekKoleksi(Request $request)
    {
        $bukuKategori = CategoryModel::all();

        $selectedCategories = $request->input('categories', []);
        $bukuChecked        = $request->has('buku');
        $sort               = $request->input('sort', '');

        $query = BooksModel::query();

        $kategoriBuku = CategoryModel::whereIn('code_category', [
            '000-099', '100-199', '300-399', '400-499', '500-599', '900-999',
        ])->pluck('id')->toArray();

        if ($bukuChecked) {
            $query->whereIn('id_category', $kategoriBuku);
        }

        if (! empty($selectedCategories)) {
            $query->whereIn('id_category', $selectedCategories);
        }

        if ($sort == 'asc') {
            $query->orderBy('judul_books', 'asc'); // A-Z
        } elseif ($sort == 'desc') {
            $query->orderBy('created_at', 'desc'); // Terbaru
        }

        $bukuKoleksi = $query->paginate(12);

        return view('pages.koleksi', compact('bukuKategori', 'bukuKoleksi', 'selectedCategories'));
    }

    public function searchPengunjung(Request $request)
    {
        $query = $request->input('query');

        $results = PengunjungModel::where(function ($queryBuilder) use ($query) {
            $queryBuilder->where('first_name', 'LIKE', "%{$query}%")
                ->orWhere('kelas', 'LIKE', "%{$query}%")
                ->orWhere('keperluan', 'LIKE', "%{$query}%");
        })
        ->where('status', '!=', 'Keluar')
        ->get();

        $filteredResults = $results->where('status', '!=', 'Keluar');

        if ($filteredResults->isEmpty()) {
            return response()->json([
                'message' => 'Anda sudah keluar',
                'name' => $query,
                'data' => []
            ]);
        }


        return response()->json([
            'message' => 'Data ditemukan',
            'data' => $filteredResults->values()
        ]);
    }

    public function MarkAsKembali($id)
    {
        $pengunjung = PengunjungModel::findOrFail($id);

        $waktuKeluar = Carbon::parse($pengunjung->updated_at);
        $waktuKembali = Carbon::now();
        $durasiBaruDalamMenit = $waktuKembali->diffInMinutes($waktuKeluar);

        $totalDurasi = $pengunjung->durasi + $durasiBaruDalamMenit;

        $pengunjung->update([
            'status' => 'keluar',
            'durasi' => $totalDurasi
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Status berhasil diperbarui!',
            'id' => $id
        ]);

    }
}
