<?php

namespace App\Http\Controllers;

use App\Models\PenguranganTabungan;
use App\Models\mytabungan;
use Illuminate\Http\Request;

class PenguranganTabunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengurangan = PenguranganTabungan::with('tabungan')->latest()->get();
        return view('pengurangan.index', compact('pengurangan'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tabungan = mytabungan::all(); // Kirim daftar tabungan agar pengguna bisa memilih
        return view('pengurangan.create', compact('tabungan'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'tabungan_id' => 'required|exists:tabungan,id',
            'jumlah_pengurangan' => 'required|numeric|min:1',
            'tanggal' => 'required|date',
        ]);

        $tabungan = mytabungan::findOrFail($request->tabungan_id);

        // Periksa apakah jumlah tabungan cukup
        if ($request->jumlah_pengurangan > $tabungan->jumlah_tabungan) {
            return back()->withErrors('Jumlah pengurangan melebihi jumlah tabungan.');
        }

        // Catat pengurangan
        PenguranganTabungan::create($request->all());

        // Kurangi jumlah tabungan
        $tabungan->decrement('jumlah_tabungan', $request->jumlah_pengurangan);

        return redirect()->route('pengurangan.index')->with('success', 'Pengurangan berhasil dicatat.');
    }
}
