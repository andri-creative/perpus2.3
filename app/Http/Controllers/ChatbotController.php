<?php

namespace App\Http\Controllers;

use App\Models\BooksModel;
use App\Services\OpenAIService;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    protected $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }

    public function index()
    {
        return view('chat');
    }

    public function send(Request $request)
{
    $userMessage = $request->input('message');

    // Cek apakah pengguna meminta deskripsi buku berdasarkan ISBN
    if (strpos(strtolower($userMessage), 'isbn') !== false) {
        preg_match('/\d{13}/', $userMessage, $matches); // Menangkap ISBN 13 digit
        $isbn = $matches[0] ?? '';

        if ($isbn) {
            // Cari buku berdasarkan ISBN
            $book = BooksModel::where('isbn_books', $isbn)->first();

            if ($book) {
                // Jika buku ditemukan
                $response = "Detail buku yang diminta:\n";
                $response .= "- Judul: {$book->judul_books}\n";
                $response .= "- ISBN: {$book->isbn_books}\n";
                $response .= "- Rak: {$book->id_rack}\n";
                $response .= "- Deskripsi: {$book->description}\n"; // Ambil deskripsi buku

                return response()->json(['response' => $response]);
            } else {
                // Buku tidak ditemukan
                return response()->json(['response' => "Buku dengan ISBN {$isbn} tidak ditemukan di database."]);
            }
        }
    }

    // Cek jika pesan pengguna mengandung kata "deskripsi dari buku"
    if (strpos(strtolower($userMessage), 'deskripsi dari buku') !== false) {
        $judul = str_replace('deskripsi dari buku', '', $userMessage);

        // Cek apakah buku ada di database
        $book = BooksModel::where('judul_books', 'LIKE', "%{$judul}%")->first();

        if ($book) {
            // Jika deskripsi ada di database, tampilkan deskripsi
            $response = "Detail buku yang diminta:\n";
            $response .= "- Judul: {$book->judul_books}\n";
            $response .= "- ISBN: {$book->isbn_books}\n";
            $response .= "- Rak: {$book->id_rack}\n";
            $response .= "- Deskripsi: {$book->description}\n"; // Ambil deskripsi buku

            // Jika deskripsi kosong, cari deskripsi eksternal
            if (empty($book->description)) {
                // Cari deskripsi buku menggunakan OpenAI
                $response .= "\nDeskripsi buku (dari OpenAI):\n";
                $response .= $this->openAIService->chat("Please provide a summary of the book titled '{$book->judul_books}'");
            }

            return response()->json(['response' => $response]);
        } else {
            return response()->json(['response' => "Buku '{$judul}' tidak ditemukan di database."]);
        }
    }

    // Jika tidak ditemukan perintah tentang buku, lanjutkan ke OpenAI
    $chatResponse = $this->openAIService->chat($userMessage);
    return response()->json(['response' => $chatResponse]);
}



}