<?php

namespace App\Http\Controllers;

use App\Models\RackModel;
use App\Models\SubModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RackController extends Controller
{
    public function Index_Bookshelf()
    {
        $rack = RackModel::all();
        $sub = SubModel::all();
        $user = Auth::user();

        return view('dashboard.pages.rak', compact('rack', 'sub', 'user'));
    }




    public function Create_Bookshelf(Request $req)
    {
        $validated = $req->validate([
            'code_rack' => 'required|max:255',
            'name_rack' => 'required|max:255',
        ]);

        $rack = new RackModel([
            'code_rack'=>$validated['code_rack'],
            'name_rack'=>$validated['name_rack']
        ]);

        $rack->save();

        return back()->with('success', 'Rack berhasil ditambahkan.');
    }

    public function Update_Bookshelf(Request $req, $id)
    {
        $validated = $req->validate([
            'code_rack' => 'required|max:255',
            'name_rack' => 'required|max:255',
        ]);

        $rack = RackModel::findOrFail($id);

        $rack->update([
            'code_rack' =>$validated['code_rack'],
            'name_rack' =>$validated['name_rack']
        ]);

        $rack->save();

        return redirect()->route('rak')->with('success', 'Rack updated successfully!');
    }

    public function Delete_Bookshelf($id)
    {
        $rack = RackModel::findOrFail($id);

        if ($rack->subs()->count() > 0) {
            return redirect()->route('rak')->with('error', 'Tidak bisa menghapus rack ini karena masih ada sub terkait.');
        }

        $rack->delete();

        return back()->with('success', 'Rack berhasil dihapus.');
    }

    // Sub

    public function Index_Sub()
    {
        $user = Auth::user();
        $rack = RackModel::all();
        $sub = SubModel::all();

        return view('dashboard.pages.sub-rack', compact('rack', 'sub', 'user'));
    }

    public function Create_Sub(Request $req)

    {
        $validated = $req->validate([
            'code_sub' => 'required|max:255',
            'code_rack' => 'required|max:255',
        ]);

        $sub = new SubModel([
            'code_sub' =>$validated['code_sub'],
            'id_rack' =>$validated['code_rack']
        ]);

        $sub->save();

        return back()->with('success', 'Sub berhasil ditambahkan.');
    }

    public function Update_Sub(Request $req, $id)
    {
        $validated = $req->validate([
            'code_sub' => 'required|max:255',

        ]);

        $subrack = SubModel::findOrFail($id);

         // Update data code_sub
         $subrack->code_sub = $req->input('code_sub');

         if ($req->has('code_rack') && $req->input('code_rack') != null) {
            $subrack->code_rack = $req->input('code_rack');
        }

        $subrack->save();

        return redirect()->route('rak')->with('success', 'Rack updated successfully!');
    }

    public function Delete_Sub($id)

    {
        $sub = SubModel::findOrFail($id);


        $sub->delete();

        return back()->with('success', 'Sub berhasil dihapus.');
    }
}