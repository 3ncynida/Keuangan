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
    $deductionLogs = DeductionLog::all(); // Fetch all deduction logs

    // Calculate total deduction
    $totalDeduction = $deductionLogs->sum('jumlah_pengurangan');

    return view('index', compact('dataTabungan', 'totalTabungan', 'deductionLogs', 'totalDeduction'));
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

public function deductAll(Request $request)
{
    // Validate the input
    $request->validate([
        'jumlah_pengurangan' => 'required|numeric|min:1',
    ]);

    $jumlahPengurangan = $request->jumlah_pengurangan;

    // Deduct from all entries and log the deduction
    mytabungan::chunk(100, function ($tabungans) use ($jumlahPengurangan) {
        foreach ($tabungans as $tabungan) {
            $originalAmount = $tabungan->jumlah_tabungan;
            $tabungan->jumlah_tabungan -= $jumlahPengurangan;

            // Ensure it doesn't go below zero
            if ($tabungan->jumlah_tabungan < 0) {
                $tabungan->jumlah_tabungan = 0;
            }

            $tabungan->save();

            // Log the deduction
            DeductionLog::create([
                'id' => $tabungan->id,
                'jumlah_tabungan' => $originalAmount - $tabungan->jumlah_tabungan,
            ]);
        }
    });

    return redirect()->route('tabungan.index')->with('success', 'Jumlah tabungan berhasil dikurangi!');
}


}
