<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
// app/Http/Controllers/TransaksiController.php
// app/Http/Controllers/TransaksiController.php

public function index()
{
    $transaksis = Transaksi::all(); // Misalnya, ambil semua data transaksi dari tabel Transaksi
    return view('transaksi.index', compact('transaksis'));
}

    public function store(Request $request)
    {
        // Logika untuk menyimpan transaksi ke database
        // Contoh: menyimpan transaksi yang diterima dari form
        Transaksi::create([
            'deskripsi' => $request->input('deskripsi'),
            'jumlah' => $request->input('jumlah'),
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan.');
    }

    public function create()
    {
        return view('transaksi.create');
    }

}
