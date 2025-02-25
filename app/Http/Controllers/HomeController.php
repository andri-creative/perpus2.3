<?php
namespace App\Http\Controllers;

use App\Models\BooksModel;
use App\Models\BorrowModel;
use App\Models\Borrow_DetailModel;
use App\Models\CategoryModel;
use App\Models\PengunjungModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function Index_Dashboard()
    {
        $user = Auth::user();

        //Total Pengunjung
        $totalPengunjug              = PengunjungModel::count();
        $totalPengunjungTahunIni     = PengunjungModel::whereYear('date_time', Carbon::now()->year)->count();
        $totalPengunjungTahunKemarin = PengunjungModel::whereYear('date_time', Carbon::now()->subYear()->year)->count();
        $selisihtahun                = $totalPengunjungTahunIni - $totalPengunjungTahunKemarin;

        // Total Pengunjung dengan status "keluar"
        $totalPengunjungKeluar = PengunjungModel::where('status', 'keluar')->count();
        // Hitung total pengunjung dengan status "keluar" untuk bulan ini
        $totalPengunjungKeluarBulanIni = PengunjungModel::where('status', 'keluar')
            ->whereMonth('date_time', Carbon::now()->month) // Filter berdasarkan bulan ini
            ->whereYear('date_time', Carbon::now()->year)   // Filter berdasarkan tahun ini
            ->count();

        // Hitung total pengunjung dengan status "keluar" untuk bulan sebelumnya
        $totalPengunjungKeluarBulanSebelumnya = PengunjungModel::where('status', 'keluar')
            ->whereMonth('date_time', Carbon::now()->subMonth()->month) // Filter berdasarkan bulan sebelumnya
            ->whereYear('date_time', Carbon::now()->subMonth()->year)   // Filter berdasarkan tahun bulan sebelumnya
            ->count();

        $selisih = $totalPengunjungKeluarBulanIni - $totalPengunjungKeluarBulanSebelumnya;

        // Total pengguna
        $totalUsers = User::count();

        // Total buku judul
        $totalBooks = BooksModel::count();

        // Buku yang sedang dipinjam
        $borrowedBooks = Borrow_DetailModel::where('status', 'Dipinjam')->count();

        // Buku yang sudah dikembalikan
        $returnedBooks = Borrow_DetailModel::where('status', 'Dikembalikan')->count();

        // Pengguna baru dalam 30 hari terakhir
        $usersLast30Days = User::where('created_at', '>=', Carbon::now()->subDays(30))->count();

        // Buku baru dalam 30 hari terakhir
        $booksLast30Days = BooksModel::where('created_at', '>=', Carbon::now()->subDays(30))->count();

        // Buku baru dalam 30-60 hari yang lalu
        $booksPrevious30Days = BooksModel::whereBetween('created_at', [
            Carbon::now()->subDays(60),
            Carbon::now()->subDays(30),
        ])->count();

        // Hitung perubahan jumlah buku dalam 30 hari terakhir
        $booksDifference = $booksLast30Days - $booksPrevious30Days;
        $booksTrendColor = $booksDifference >= 0 ? 'text-success-main' : 'text-danger-main';
        $booksTrendIcon  = $booksDifference >= 0 ? 'bxs:up-arrow' : 'bxs:down-arrow';

        // Total buku dipinjam
        $totalBorrowedBooks = BorrowModel::count();

        // Buku dipinjam dalam 30 hari terakhir
        $borrowedLast30Days = BorrowModel::where('created_at', '>=', Carbon::now()->subDays(30))->count();

        // Buku dipinjam dalam 30-60 hari yang lalu
        $borrowedPrevious30Days = BorrowModel::whereBetween('created_at', [
            Carbon::now()->subDays(60),
            Carbon::now()->subDays(30),
        ])->count();

        // Hitung perubahan jumlah buku dipinjam dalam 30 hari terakhir
        $borrowedDifference = $borrowedLast30Days - $borrowedPrevious30Days;
        $borrowedTrendColor = $borrowedDifference >= 0 ? 'text-success-main' : 'text-danger-main';
        $borrowedTrendIcon  = $borrowedDifference >= 0 ? 'bxs:up-arrow' : 'bxs:down-arrow';

        // Total Pinjam
        // $topPeminjam = BorrowModel::select('user_id', DB::raw('count(*) as total_peminjaman'))
        // ->groupBy('user_id')
        // ->orderByDesc('total_peminjaman')
        // ->limit(5)
        // ->get();

        // Assuming 'keperluan'
        $monthlyVisitors = PengunjungModel::selectRaw('MONTH(date_time) as month, YEAR(date_time) as year, SUM(keperluan) as total_expense')
            ->groupByRaw('MONTH(date_time), YEAR(date_time)')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        // Total sisa buku
        $totalSisa = BooksModel::sum('number_books');

        return view('dashboard.pages.dashboard', compact(
            'user',
            'totalUsers',
            'totalBooks',
            'borrowedBooks',
            'returnedBooks',
            'usersLast30Days',
            'booksLast30Days',
            'booksDifference',
            'booksTrendColor',
            'booksTrendIcon',
            'totalBorrowedBooks',
            'borrowedDifference',
            'borrowedTrendColor',
            'borrowedTrendIcon',
            // 'topPeminjam',
            'totalPengunjungKeluar',
            'selisih',
            'selisihtahun',
            'totalPengunjug',
            'monthlyVisitors',
            'totalSisa'
        ));
    }

    public function Index_Login()
    {
        return view('dashboard.login');
    }

    public function getBooksPerMonth(Request $request)
    {
        $year = $request->input('year', date('Y'));

        // Ambil jumlah buku per bulan
        $booksPerMonth = BooksModel::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->pluck('count', 'month');

        // Buat array dengan nilai default 0 untuk setiap bulan
        $monthlyData = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyData[] = isset($booksPerMonth[$i]) ? number_format($booksPerMonth[$i], 2) : 0;
        }

        // Ambil jumlah buku untuk tahun yang dipilih
        $booksCurrentYear = BooksModel::whereYear('created_at', $year)
            ->count();

        // Ambil jumlah buku untuk tahun sebelumnya
        $previousYear      = $year - 1;
        $booksPreviousYear = BooksModel::whereYear('created_at', $previousYear)
            ->count();

        // Hitung persentase perubahan
        $percentageChange = 0;
        if ($booksPreviousYear > 0) {
            $percentageChange = (($booksCurrentYear - $booksPreviousYear) / $booksPreviousYear) * 100;
        }

                            // Tentukan warna dan indikator perubahan
        $trend      = 'up'; // Default ke naik
        $trendColor = 'bg-success-focus text-success-main';
        if ($percentageChange < 0) {
            $trend      = 'down';
            $trendColor = 'bg-danger-focus text-danger-main';
        }

        // Kirimkan data ke frontend
        return response()->json([
            'year'              => $year,
            'data'              => $monthlyData,
            'booksCurrentYear'  => $booksCurrentYear,
            'booksPreviousYear' => $booksPreviousYear,
            'percentageChange'  => number_format($percentageChange, 2),
            'trend'             => $trend,
            'trendColor'        => $trendColor,
        ]);
    }

    public function getPieChartData(Request $request)
    {
        $year = $request->input('year');

        // Hitung jumlah status "dipinjam" dan "dikembalikan"
        $statusCounts = Borrow_DetailModel::query()
            ->select('status', DB::raw('COUNT(*) as total'))
            ->whereYear('created_at', $year)
            ->groupBy('status')
            ->get()
            ->pluck('total', 'status')
            ->toArray();

        // Siapkan data untuk chart
        $statuses = ['Dipinjam', 'Dikembalikan'];
        $data     = [
            'labels' => $statuses,
            'series' => [
                $statusCounts['Dipinjam'] ?? 0,
                $statusCounts['Dikembalikan'] ?? 0,
            ],
        ];

        return response()->json($data);
    }

    public function getStackedBarChartData(Request $request)
    {
        $year = $request->input('year');

        $totalBooks = BooksModel::join('category', 'books.id_category', '=', 'category.id')
            ->whereYear('books.created_at', $year)
            ->select('category.name_category', DB::raw('COUNT(books.id) as total'))
            ->groupBy('category.name_category')
            ->pluck('total', 'category.name_category')
            ->toArray();

        $borrowedBooks = Borrow_DetailModel::join('books', 'borrow_details.book_id', '=', 'books.id')
            ->join('category', 'books.id_category', '=', 'category.id')
            ->where('borrow_details.status', 'Dipinjam') // Sesuaikan jika case-sensitive
            ->whereYear('borrow_details.created_at', $year)
            ->select('category.name_category', DB::raw('COUNT(books.id) as total'))
            ->groupBy('category.name_category')
            ->pluck('total', 'category.name_category')
            ->toArray();

        // Gabungkan data berdasarkan nama kategori
        $categories = array_keys($totalBooks + $borrowedBooks);
        $data       = [
            'categories' => $categories, // Nama kategori
            'series'     => [
                [
                    'name' => 'Tersedia',
                    'data' => array_map(function ($category) use ($totalBooks, $borrowedBooks) {
                        return ($totalBooks[$category] ?? 0) - ($borrowedBooks[$category] ?? 0);
                    }, $categories),
                ],
                [
                    'name' => 'Dipinjam',
                    'data' => array_map(function ($category) use ($borrowedBooks) {
                        return $borrowedBooks[$category] ?? 0;
                    }, $categories),
                ],
            ],
        ];

        return response()->json($data);
    }

    public function getVisitorData(Request $request)
    {
        $year = $request->input('year');

        $total_pengunjung = PengunjungModel::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->pluck('count', 'month');

        $monthlyData = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyData[] = isset($total_pengunjung[$i]) ? $total_pengunjung[$i] : 0;
        }

        $total_pengunjung_keluar = PengunjungModel::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', $year)
            ->where('status', 'keluar')
            ->groupBy('month')
            ->pluck('count', 'month');

        $monthlyDataKeluar = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyDataKeluar[] = isset($total_pengunjung_keluar[$i]) ? $total_pengunjung_keluar[$i] : 0;
        }

        return response()->json([
            'total_pengunjung'        => $monthlyData,
            'total_pengunjung_keluar' => $monthlyDataKeluar,
        ]);
    }

    public function getKeterlambatan(Request $request)
    {
        $year = $request->input('year');

        $terlambat = Borrow_DetailModel::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->whereYear('created_at', $year)->where('status', 'Dikembalikan')->where('keterlambatan', 'terlambat')->count();

        $tepatWaktu = Borrow_DetailModel::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->whereYear('created_at', $year)->where('status', 'Dikembalikan')->where('keterlambatan', 'tepat_waktu')->count();

        return response()->json([
            'terlambat'   => $terlambat,
            'tepat_waktu' => $tepatWaktu,
        ]);
    }

    public function Books_view(Request $request)
    {
        $query = BooksModel::query();

        if ($request->has('keywords') && $request->keywords) {
            $query->where('judul_books', 'LIKE', '%' . $request->keywords . '%')
                ->orWhere('autor_books', 'LIKE', '%' . $request->keywords . '%')
                ->orWhere('isbn_books', 'LIKE', '%' . $request->keywords . '%');
        }

        if ($request->has('category') && $request->category) {
            $query->where('id_category', $request->category);
        }

        $book       = $query->paginate(6);
        $categories = CategoryModel::all();

        return view('book-view', compact('book', 'categories'));
    }

    public function Treker_Index(Request $request)
    {
        $search = $request->input('search');

        $pengunjung = collect(); // Koleksi kosong untuk default

        if ($search) {
            $pengunjung = PengunjungModel::where('status', 'masih di ruang')
                ->where('first_name', 'like', '%' . $search . '%')
                ->get();
        } else {
            // Jika pencarian kosong, tampilkan semua pengunjung
            $pengunjung = PengunjungModel::where('status', 'masih di ruang')->get();
        }

        if ($request->ajax()) {
            return view('partials.pengunjung_table', compact('pengunjung'))->render();
        }

        return view('treker', compact('pengunjung', 'search'));
    }

    public function Index_Welcome()
    {
        $userLi = User::all();
        return view('welcome', compact('userLi'));
    }
}