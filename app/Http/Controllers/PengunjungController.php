<?php

namespace App\Http\Controllers;

use App\Models\BooksModel;
use App\Models\PengunjungModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengunjungController extends Controller
{
    public function Index_Pengunjung()
    {
        return view('pages.pengunjung' );
    }

    public function Create_Pengunjung(Request $req)
    {
        // Validasi input
        $val = $req->validate([
            'first_name' => 'required|string|max:255',
            'kelas' => 'required|string|max:10',
            'keperluan' => 'required|string',
        ]);

        $day_of_week = Carbon::now()->translatedFormat('l');
        $formatted_date_time = Carbon::now()->format('Y-m-d H:i:s');

        // Simpan data ke dalam model
        $create = new PengunjungModel([
                'first_name' => $val['first_name'],
                'day' => $day_of_week,
                'date_time' => $formatted_date_time,
                'kelas' => $val['kelas'],
                'keperluan' => $val['keperluan'],
        ]);

        $create->save();

        return redirect()->back()->with('success', 'Data pengunjung berhasil disimpan.');
    }


    // Daftar Buku
    public function Index_DaftarBuku()
    {
        $book = BooksModel::orderByRaw('CAST(SUBSTRING(id, 7) AS UNSIGNED) ASC')->get();
        return view('pages.daftar-buku', compact('book'));
    }

    // Daftar User
    public function Index_DaftarUser()
    {
        $users = User::all();
        return view('pages.daftar-user', compact('users'));
    }

    // Data Pengujung
    public function Index_DataPenjunng(Request $request)
    {
        $user = Auth::user();
        $orderBy = $request->input('order', 'desc');

        $pengunjung = PengunjungModel::orderBy('date_time', $orderBy)->get();
        // $pengunjung = PengunjungModel::orderBy('date_time', 'asc')->get();

        // $pengunjung = PengunjungModel::orderBy('id', 'asc')->get();

        return view('dashboard.pages.data-pengunjung', compact('user', 'pengunjung'));
    }

    public function deletePengunjung(Request $request)
    {
        // Ambil ID pengunjung yang akan dihapus
        $ids = $request->input('ids');

        // Hapus data pengunjung berdasarkan ID
        PengunjungModel::whereIn('id', $ids)->delete();

        // Return response sukses
        return response()->json(['success' => true, 'message' => 'Pengunjung berhasil dihapus']);
    }



    // Mask Pengujung

    // public function Index_Pe(Request $request)
    // {
    //     $search = $request->input('search');

    //     if ($request->ajax()) {
    //         $pengunjung = PengunjungModel::when($search, function ($query, $search) {
    //             return $query->where('first_name', 'like', "%{$search}%");

    //         })
    //         ->where('status', '!=', 'keluar')
    //         ->get();

    //         // Kembalikan view parsial dengan data hasil pencarian
    //         return view('pengunjung.partials.search_results', compact('pengunjung'))->render();
    //     }

    //     return view('back-perpu', ['pengunjung' => [], 'search' => $search]);
    // }

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

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Data berhasil disimpan!',
        // ]);

    }


    public function filter(Request $request)
    {
        $user = Auth::user();
        $query = PengunjungModel::query();

        if ($request->filled('bulan')) {
            $query->whereMonth('created_at', $request->bulan);
        }

        if ($request->filled('tahun')) {
            $query->whereYear('created_at', $request->tahun);
        }

        $pengunjung = $query->get();

        return view('dashboard.pages.data-pengunjung', [
            'pengunjung' => $pengunjung, 'user'=> $user
        ]);
    }

    // APi pengunjung
    // public function Pengujung_API(Request $request){
    //     $search = $request->query('search');

    //     // Jika parameter search ada, cari data berdasarkan nama
    //     if ($search) {
    //         $peApi = PengunjungModel::where('first_name', 'like', "%{$search}%")->get();
    //     } else {
    //         // Jika tidak ada parameter search, ambil semua data
    //         $peApi = PengunjungModel::all();
    //     }

    //     // Kembalikan data dalam format JSON
    //     return response()->json($peApi);
    // }


    // public function Pe_API(Request $request){
    //     $apiPe = PengunjungModel::all();

    //     return response()->json($apiPe);
    // }
}
