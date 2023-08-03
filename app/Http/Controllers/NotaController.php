<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;

class NotaController extends Controller
{
// app/Http/Controllers/NotaController.php

public function create()
{
    return view('nota.create');
}

public function store(Request $request)
{
    $nota = Nota::create([
        'judul' => $request->input('judul'),
    ]);

    $deskripsi = $request->input('deskripsi');
    $jumlah = $request->input('jumlah');

    if ($deskripsi && $jumlah && count($deskripsi) === count($jumlah)) {
        $transaksis = [];
        foreach ($deskripsi as $key => $value) {
            $transaksis[] = new Transaksi([
                'deskripsi' => $deskripsi[$key],
                'jumlah' => $jumlah[$key],
            ]);
        }

        $nota->transaksis()->saveMany($transaksis);

        return redirect()->route('nota.index')->with('success', 'Nota berhasil dibuat.');
    }

    return redirect()->route('nota.create')->with('error', 'Data transaksi tidak valid.');
}


public function index()
{
    $notas = Nota::with('transaksis')->get();
    return view('nota.index', compact('notas'));
}

}
