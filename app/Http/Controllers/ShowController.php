<?php

namespace App\Http\Controllers;

use App\Models\BooksModel;
use App\Models\Borrow_DetailModel;
use App\Models\CategoryModel;
use App\Models\RackModel;
use App\Models\SubModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function Show_rack($id){
        $user =  Auth::user();

        $rack = RackModel::findOrFail($id);

        return view('dashboard.components.show.show-rack', compact('rack', 'user'));
    }
    public function Show_SubRack($id){

        $user =  Auth::user();

        $subs = SubModel::findOrFail($id);
        $rack = RackModel::all();
        $selectedRackId = $rack;

        return view('dashboard.components.show.show-subrack', compact('subs','rack', 'user','selectedRackId'));
    }

    public function Show_Books($id) {
        $user =  Auth::user();
        $books = BooksModel::with('rack')->findOrFail($id);
        $rack_all = RackModel::all();
        $subs_all = SubModel::where('rack_id', $books->id_rack)->get();
        $category = CategoryModel::all();


        return view('dashboard.components.show.show-books', compact('user', 'books', 'rack_all', 'subs_all', 'category'));
    }

    public function Show_Category($id){
        $user =  Auth::user();

        $category = CategoryModel::findOrFail($id);

        return view('dashboard.components.show.show-category', compact('user', 'category'));
    }

    public function Show_DetailBooks($id)
    {
        $books = BooksModel::findOrFail($id);
        return view('detail-buku', compact('books'));
    }

    public function Show_Back($id)
    {
        $user =  Auth::user();

        $books = Borrow_DetailModel::with(['book', 'borrowedByUser', 'book.category', 'book.rack', 'borrow'])
        ->findOrFail($id);
        return view('dashboard.components.show.show-back', compact('books', 'user'));
    }
    public function Show_History($id)
    {
        $user =  Auth::user();

        $books = Borrow_DetailModel::with(['book', 'borrowedByUser', 'returnedByUser', 'book.category', 'book.rack', 'borrow'])
        ->findOrFail($id);
        return view('dashboard.components.show.history-back', compact('books', 'user'));
    }
}
