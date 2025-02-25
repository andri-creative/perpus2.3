<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function Index_Category()
    {
        $category = CategoryModel::all();
        $user = Auth::user();
        return view('dashboard.pages.category', compact('category', 'user'));
    }

    public function Create_Category(Request $req)
    {
        $validated = $req->validate([
            'code_category' => 'required|max:255',
            'name_category' => 'required|max:255',
        ]);

        // dd($validated);

        $category = new CategoryModel([
            'code_category' => $validated['code_category'],
            'name_category' => $validated['name_category'],
        ]);

        $category->save();

        return back()->with('success', 'Category berhasil ditambahkan.');
    }

    public function Update_Category(Request $req,$id)
    {
        $validated = $req->validate([
            'code_category' => 'required|max:255',
            'name_category' => 'required|max:255',
        ]);

        $category = CategoryModel::findOrFail($id);

        $category->update([
            'code_category' => $validated['code_category'],
            'name_category' => $validated['name_category']
        ]);

        $category->save();

        return back()->with('success', 'Category berhasil perbarui.');
    }

    public function Delete_Category($id)
    {
        $delete = CategoryModel::findOrFail($id);

        $delete->delete();

        return back()->with('success', 'Category berhasil dihapus.');
    }
}