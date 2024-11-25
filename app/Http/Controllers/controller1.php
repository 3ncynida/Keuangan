<?php

namespace App\Http\Controllers;

use App\Models\mytabungan;
use Illuminate\Http\Request;
use App\Models\DeductionLog;


// memanggil model untuk controller ini

class controller1 extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $dataTabungan = mytabungan::all();
    $totalTabungan = $dataTabungan->sum('jumlah_tabungan');

    return view('index', compact('dataTabungan', 'totalTabungan'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
    {
        // Validasi menggunakan metode yang disediakan oleh Laravel
        $request->validate([
            'jumlah_tabungan' => 'required|numeric', // Ganti 'tabungan' dengan aturan validasi yang benar
            'tanggal' => 'required|date',
        ]);
        
        // Menyimpan data
        mytabungan::create([
            'jumlah_tabungan' => $request->jumlah_tabungan,
            'tanggal' => $request->tanggal,
        ]);
        
        return redirect(route('tabungan.index'));
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataEditTabungan = mytabungan::find($id);
        return view('edit', compact('dataEditTabungan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validasi data
    $request->validate([
        'jumlah_tabungan' => 'required|numeric',
        'tanggal' => 'required|date',
    ]);

    // Temukan dan perbarui data
    $tabungan = mytabungan::findOrFail($id);
    $tabungan->jumlah_tabungan = $request->jumlah_tabungan;
    $tabungan->tanggal = $request->tanggal;
    $tabungan->save();

    return redirect()->route('tabungan.index')->with('success', 'Data berhasil diperbarui!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        mytabungan::where('id', $id)->delete();
        return redirect(route('tabungan.index'));
    }
}
