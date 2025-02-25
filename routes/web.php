<?php

use App\Exports\PengunjungExport;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\DurationsController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\RackController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\FlareClient\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('/', [HomeController::class, 'Index_Welcome'])->name('home');

Route::get('/book-home', [HomeController::class, 'Books_view'])->name('books.home');
Route::get('/pengujung', [HomeController::class, 'Treker_Index'])->name('treker');

// Dashboard
// Route::get('dashboard', [HomeController::class, 'Index_Dashboard'])->name('dashboard');

// Loggin
Route::get('login', [HomeController::class, 'Index_Login'])->name('login');
Route::post('create-login', [UserController::class, 'Create_Login'])->name('login.submit');
Route::post('/logout', [UserController::class, 'Logout_User'])->name('logout')->middleware('auth');

// Data
Route::get('pengunjung', [PengunjungController::class, 'Index_Pengunjung'])->name('pengunjung');
Route::get('daftar-buku', [PengunjungController::class, 'Index_DaftarBuku'])->name('daftar.buku');
Route::get('daftar-user', [PengunjungController::class, 'Index_DaftarUser'])->name('daftar.user');

// Create
Route::post('pengunjung/create', [PengunjungController::class, 'Create_Pengunjung'])->name('create.pengunjung');

// Showw Detail Buku
Route::get('detail/{id}', [ShowController::class, 'Show_DetailBooks'])->name('show.buku');

Route::get('/chat', [ChatbotController::class, 'index'])->name('chat.index');
Route::post('/chat/send', [ChatbotController::class, 'send'])->name('chat.send');

// Maks Pengujung
Route::get('back', [PengunjungController::class, 'Index_Pe'])->name('maks.pengujung');
Route::put('back/{id}', [PengunjungController::class, 'MarkAsKembali'])->name('maks.back');

// Route::get('dashboard', [HomeController::class, 'Index_Dashboard'])
//     ->name('dashboard')
//     ->middleware('role:super admin,administrator,user');


// Form Terbaru di di component pada Home
Route::get('beranda', [BerandaController::class, 'indexBeranda'])->name('beranda');
Route::get('koleksi', [KoleksiController::class, 'indekKoleksi'])->name('koleksi');
Route::get('/search-pengunjung', [KoleksiController::class, 'searchPengunjung']);
Route::post('/mark-as-kembali/{id}', [KoleksiController::class, 'MarkAsKembali']);



Route::get('/pengunjungs', function(){
    return View('pages.pengunjung');
})->name('pen');

//     // Books Management (akses hanya untuk "super admin" dan "administrator")
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('dashboard', [HomeController::class, 'Index_Dashboard'])->name('dashboard');
    Route::get('/dashboard/books-data', [HomeController::class, 'getBooksPerMonth']);
    Route::get('/dashboard/chart-data', [HomeController::class, 'getPieChartData']);
    Route::get('/dashboard/stacked-bar-chart-data', [HomeController::class, 'getStackedBarChartData']);
    Route::get('/dashboard/visitor-data', [HomeController::class, 'getVisitorData']);
    Route::get('/dashboard/keterlabatan', [HomeController::class, 'getKeterlambatan']);
    // End Dahboard

    // Tambah
    // New Buku
    Route::get('tambah/tambah-buku', [BooksController::class, 'Index_NewBook'])->name('new');
    Route::get('tambah/get-category/{code_category}', [BooksController::class, 'Get_Category']);
    Route::post('tambah/get-subs', [BooksController::class, 'Get_Subs'])->name('get.subs');
    Route::post('tambah/create/books', [BooksController::class, 'Create_Books'])->name('create.books');
    Route::put('tambah/update/books/{id}', [BooksController::class, 'Update_Books'])->name('update.books');
    Route::delete('tambah/delete/books/{id}', [BooksController::class, 'Delete_Books'])->name('delete.books');

    // // Categori
    Route::get('tambah/kategori', [CategoryController::class, 'Index_Category'])->name('category');
    Route::post('tambah/kategory/create', [CategoryController::class, 'Create_Category'])->name('create.category');
    Route::put('tambah/update/category/{id}', [CategoryController::class, 'Update_Category'])->name('update.category');
    Route::delete('tambah/delete/category/{id}', [CategoryController::class, 'Delete_Category'])->name('delete.category');

    // // Rak Buku
    Route::get('tambah/rak', [RackController::class, 'Index_Bookshelf'])->name('rak');
    Route::post('tambah/create/rak', [RackController::class, 'Create_Bookshelf'])->name('create.rak');
    Route::put('tambah/update/rak/{id}', [RackController::class, 'Update_Bookshelf'])->name('update.rak');
    Route::delete('tambah/delete/rak/{id}', [RackController::class, 'Delete_Bookshelf'])->name('delete.rak');

    // Sub Rak
    Route::get('tambah/sub', [RackController::class, 'Index_Sub'])->name('sub');
    Route::post('tambah/create/sub', [RackController::class, 'Create_Sub'])->name('create.sub');
    Route::put('tambah/update/sub/{id}', [RackController::class, 'Update_Sub'])->name('update.sub');
    Route::delete('tambah/delete/sub/{id}', [RackController::class, 'Delete_Sub'])->name('delete.sub');

    // Show
    Route::get('tambah/sub/{id}', [ShowController::class, 'Show_SubRack'])->name('subs.show');
    Route::get('tambah/rack/{id}', [ShowController::class, 'Show_rack'])->name('rack.show');
    Route::get('tambah/category/{id}', [ShowController::class, 'Show_Category'])->name('category.show');
    Route::get('tambah/book/{id}', [ShowController::class, 'Show_Books'])->name('books.show');
    Route::get('tambah/back/show/{id}', [ShowController::class, 'Show_Back'])->name('back.show');
    Route::get('tambah/histori/show/{id}', [ShowController::class, 'Show_History'])->name('histori.show');
    // End Tambah

    // List Books
    Route::get('book', [BooksController::class, 'List_Books'])->name('books');
    // Route::get('/books', [BooksController::class, 'List_Books'])->name('books.list');
    // End Books

    // Pinjam Buku
    Route::get('/dashboard/search', [BorrowController::class, 'searchBooks']);

    // Borrow Books
    Route::get('pinjam-buku/pinjam', [BorrowController::class, 'Index_Borrow'])->name('pinjam');
    Route::get('/search-books', [BorrowController::class, 'Index_Borrow'])->name('search.books');
    Route::get('/books/search', [BorrowController::class, 'search'])->name('books.search');
    Route::post('/borrow/submit', [BorrowController::class, 'Create_Borrow'])->name('borrow.submit');
    Route::get('pinjam-buku/borrowing-table', [BorrowController::class, 'Table_Borrow'])->name('borrowing.table');
    Route::post('/borrow/return-single/{borrow_id}/{book_id}', [BorrowController::class, 'Return_Borrow'])->name('borrow.return_single');
    Route::get('histori', [BorrowController::class, 'Index_Hisrori'])->name('histori');

    // Kembali baru
    Route::post('/kembali/kembali-buku', [BorrowController::class, 'returnSingle']);
    Route::delete('/kembali/delete-data', [BorrowController::class, 'deleteData']);

    // // Profile
    Route::get('view-profile', [UserController::class, 'Index_View'])->name('view-profile');
    Route::get('user-profile', [UserController::class, 'Index_User'])->name('user-profile');

    // // User
    Route::post('create-user', [UserController::class, 'Create_User'])->name('create-user');
    Route::get('view-profile', [UserController::class, 'Index_View'])->name('view-profile');
    Route::put('/user/update/{id}', [UserController::class, 'Update_User'])->name('user.update');
    Route::put('/user/updateFoto/{id}', [UserController::class, 'Update_UserFoto'])->name('user.updatePhoto');

    // User List
    Route::get('user-list', [UserController::class, 'Index_UserList'])->name('user.list');

    // Pengunjung
    Route::get('data-pengujung', [PengunjungController::class, 'Index_DataPenjunng'])->name('data.pengunjung');
    Route::post('/delete-pengunjung', [PengunjungController::class, 'deletePengunjung'])->name('delete.pengunjung');
    Route::get('/pengunjung/filter', [PengunjungController::class, 'filter'])->name('pengunjung.filter');

    // Inport Book
    Route::post('buku-import', [ImportController::class, 'Import_Books'])->name('import.book.data');
    // Template
    Route::get('download-template', [ImportController::class, 'downloadTemplate'])->name('books.downloadTemplate');

    Route::get('/export-books', [ExportController::class, 'exportBooks'])->name('export.books');

    Route::get('export', [ExportController::class, 'Index_export'])->name('export');
    Route::get('/export-pengunjung', function () {
        return Excel::download(new PengunjungExport, 'pengunjung.xlsx');
    });

    // Expoer Books yang sudah di kemabalikan
    Route::get('/export-kembalikan', [ExportController::class, 'exportReturnedBooks'])->name('book.export');

    // Durations
    Route::get('pages/durasi', [DurationsController::class, 'Index_Durations'])->name('durasi');
    Route::post('/durations', [DurationsController::class, 'storeDurasi'])->name('durations.store');
    Route::put('/durations/{id}', [DurationsController::class, 'update'])->name('durations.update');
    Route::delete('/durations/{id}', [DurationsController::class, 'destroy']);

    // Export Detail Pebulan dan tahun
});

// Error
Route::get('/404', function () {
    return view('errors.404');
});
