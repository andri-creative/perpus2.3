<?php
namespace App\Http\Controllers;

use App\Models\BooksModel;
use App\Models\BorrowModel;
use App\Models\Borrow_DetailModel;
use App\Models\CategoryModel;
use App\Models\DurationsModal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BorrowController extends Controller
{
    public function Index_Borrow(Request $req)
    {
        $search = $req->input('search');
        $user   = Auth::user();

        $durasi = DurationsModal::all();

        // Melakukan pencarian berdasarkan ISBN atau Judul Buku
        $books = BooksModel::where('isbn_books', 'like', "%{$search}%")
            ->orWhere('judul_books', 'like', "%{$search}%")
            ->get();

        return view('dashboard.pages.borrow', compact('books', 'user', 'durasi'));
    }

    public function Create_Borrow(Request $request)
    {

        try {
            // Validasi request
            $request->validate([
                'name_borrow'       => 'required|string|max:255',
                'number_id'         => 'required|string|max:50',
                'phone'             => 'required|string|max:20',
                'position_borrow'   => 'required|string|max:255',
                'book_identity'     => 'required|string|max:255',
                'id_books-pinjam'   => 'required|array|min:1',
                'id_books-pinjam.*' => 'required|string|distinct',
                'counter-pinjam'    => 'required|array|min:1',
                'counter-pinjam.*'  => 'required|integer|min:1',
            ]);

            // Filter data dengan nilai default
            $borrow['id_books-pinjam'] = array_values(array_filter($request->input('id_books-pinjam', [])));
            $borrow['counter-pinjam']  = array_values(array_filter($request->input('counter-pinjam', [])));

            // Mulai transaksi
            DB::beginTransaction();

            // Cek user login
            if (! auth()->check()) {
                return back()->withErrors('Pengguna belum login.');
            }

            // Simpan data peminjam ke `borrow` table
            $borrowRecord = BorrowModel::create([
                'name_borrow'     => $request->name_borrow,
                'id_card'         => $request->number_id,
                'position_borrow' => $request->position_borrow,
                'phone_borrow'    => $request->phone,
                'borrow_duration' => $request->duration,
                'class_or_notes'  => $request->class_or_notes,
                'borrowed_by'     => auth()->user()->id,
            ]);

            // Iterasi untuk setiap buku yang dipinjam
            foreach ($borrow['id_books-pinjam'] as $index => $bookId) {
                $quantityBorrowed = $borrow['counter-pinjam'][$index];
                $book             = BooksModel::find($bookId);

                if (! $book) {
                    throw new \Exception('Buku dengan ID ' . $bookId . ' tidak ditemukan.');
                }

                if ($book->number_books >= $quantityBorrowed) {
                    // Update jumlah buku
                    $book->number_books -= $quantityBorrowed;
                    $book->save();
                } else {
                    throw new \Exception('Jumlah buku tidak mencukupi untuk buku dengan judul ' . $book->judul_books);
                }

                $borrowDate = Carbon::now();
                // Simpan detail peminjaman ke `borrow_details` table
                Borrow_DetailModel::create([
                    'borrow_id'     => $borrowRecord->id,
                    'book_id'       => $bookId,
                    'counter'       => $quantityBorrowed,
                    'status'        => 'Dipinjam',
                    'book_identity' => $request->book_identity,
                    'borrowed_by'   => auth()->user()->id,
                    'borrow_date'   => $borrowDate,
                    'return_date'   => null,
                    'keterlambatan' => null,
                ]);
            }

            // Commit transaksi
            DB::commit();

            // Redirect dengan pesan sukses
            return back()->with('success', 'Peminjaman berhasil dilakukan.');
        } catch (\Exception $e) {
            // Rollback jika ada error
            DB::rollback();
            return back()->withErrors('Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function Return_Borrow($borrow_id, $book_id)
    {
        $borrowDetail = Borrow_DetailModel::where('borrow_id', $borrow_id)
            ->where('book_id', $book_id)
            ->first();

        // Jika detail peminjaman tidak ditemukan
        if (! $borrowDetail) {
            return redirect()->back()->withErrors('Detail peminjaman tidak ditemukan.');
        }

        DB::beginTransaction();

        try {
            // Ambil informasi durasi pinjaman dari tabel `borrow`
            $borrowDuration     = $borrowDetail->borrow->borrow_duration;
            $expectedReturnDate = Carbon::parse($borrowDetail->borrow_date)->addMonths($borrowDuration);
            $returnDate         = Carbon::now();

            // Periksa apakah pengembalian terlambat
            if ($returnDate->greaterThan($expectedReturnDate)) {
                $borrowDetail->keterlambatan = 'terlambat';
            } else {
                $borrowDetail->keterlambatan = 'tepat_waktu';
            }

            // Perbarui status peminjaman menjadi 'Dikembalikan'
            $borrowDetail->status      = 'Dikembalikan';
            $borrowDetail->return_date = $returnDate; // Simpan tanggal pengembalian
            $borrowDetail->returned_by = auth()->user()->id;
            $borrowDetail->save();

            // Ambil informasi buku berdasarkan book_id
            $book = BooksModel::find($book_id);

            // Jika buku tidak ditemukan
            if (! $book) {
                return redirect()->back()->withErrors('Buku tidak ditemukan.');
            }

            // Tambahkan kembali jumlah buku yang dipinjam ke stok
            $book->number_books += $borrowDetail->counter;
            $book->save();

            DB::commit();
            return redirect()->back()->with('success', 'Buku berhasil dikembalikan. Status: ' . $borrowDetail->keterlambatan);
        } catch (\Exception $e) {
            DB::rollback();                                                   // Rollback transaksi jika terjadi error
            Log::error('Error saat mengembalikan buku: ' . $e->getMessage()); // Log error
            return redirect()->back()->withErrors('Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        // $page = $request->input('page', 1);

        $books = [];
        if ($search) {
            $books = BooksModel::where('isbn_books', 'like', "%{$search}%")
                ->orWhere('judul_books', 'like', "%{$search}%")
                ->get();
        }

        if ($request->ajax()) {
            // Hanya kembalikan partial view jika AJAX
            return view('dashboard.books.search-results', compact('books'))->render();
        }

        // Untuk request non-AJAX, kembalikan view utama
        return view('dashboard.books.index', compact('books'));
    }

    public function Table_Borrow()
    {
        $category = CategoryModel::all();
        $user     = Auth::user();

        $list_detail = Borrow_DetailModel::with(['rack', 'category', 'borrow', 'books'])
            ->where('status', '<>', 'Dikembalikan')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.pages.borrowing-table', compact('list_detail', 'user'));
    }

    public function Index_Hisrori()
    {
        $category = CategoryModel::all();
        $user     = Auth::user();

        $list_detail = Borrow_DetailModel::with(['rack', 'category', 'borrow', 'books'])
            ->where('status', '<>', 'Dipinjam')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.pages.histori', compact('list_detail', 'user'));
    }

    public function searchBooks(Request $request)
    {
        $query = $request->input('searchBooks');

        $books = BooksModel::where('judul_books', 'like', "%{$query}%")
            ->orWhere('isbn_books', 'like', "%{$query}%")
            ->get();

        return view('dashboard.partials.book_table', ['books' => $books]);

        // if($books->isEmpty()){
        //     return response()->json([]);
        // }

        // return response()->json($books);
    }

    public function returnSingle(Request $request)
    {
        $ids = $request->input('ids');

        // return response()->json(
        //     [
        //         "data" => $ids
        //     ]);

        foreach ($ids as $id) {
            $detail = Borrow_DetailModel::find($id);

            if ($detail) {

                $borrowDuration     = $detail->borrow->borrow_duration;
                $expectedReturnDate = Carbon::parse($detail->borrow_date)->addMonths($borrowDuration);
                $returnDate         = Carbon::now();

                if ($returnDate->greaterThan($expectedReturnDate)) {
                    $detail->keterlambatan = 'terlambat';
                } else {
                    $detail->keterlambatan = 'tepat_waktu';
                }

                $detail->update([
                    'returned_by'   => auth()->user()->id,
                    'return_date'   => $returnDate,
                    'keterlambatan' => $detail->keterlambatan,
                    'status'        => 'Dikembalikan',
                ]);

                $book = BooksModel::find($detail->book_id);

                if (! $book) {
                    continue;
                }

                $book->number_books += $detail->counter;
                $book->save();
            }
        }
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diupdate',
        ]);
    }

    public function deleteData(Request $request)
    {
        $ids = $request->input('ids');

        if (empty($ids)) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak ada data yang dipilih!',
            ]);
        }
        try {
            $details = Borrow_DetailModel::whereIn('id', $ids)->get();

            foreach ($details as $detail) {
                $book = BooksModel::find($detail->book_id);

                if ($book) {
                    $book->number_books += $detail->counter;
                    $book->save();
                }
            }

            Borrow_DetailModel::destroy($ids);

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dihapus',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ]);
        }
    }

}