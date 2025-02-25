<?php

namespace App\Http\Controllers;

use App\Models\DurationsModal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DurationsController extends Controller
{
    public function Index_Durations()
    {
        $user = Auth::user();

        $durasiData = DurationsModal::all();

        return view('dashboard.pages.durasi', compact('user', 'durasiData'));
    }

    public function storeDurasi(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
        ]);

        DurationsModal::create([
            'category' => $request->category,
            'default_duration' => $request->duration,
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'duration' => 'required|integer|min:1',
        ]);

        // Cari data berdasarkan ID
        $duration = DurationsModal::findOrFail($id);
        $duration->default_duration = $request->duration;
        $duration->save(); // Simpan perubahan

        // Kembalikan respons JSON
        return response()->json([
            'updated_duration' => $duration->default_duration,
        ]);
    }

    public function destroy($id)
    {
        // Cari data berdasarkan ID dan hapus
        $duration = DurationsModal::findOrFail($id);
        $duration->delete();

        // Kembalikan respons JSON
        return response()->json(['message' => 'Item berhasil dihapus']);
    }
}
