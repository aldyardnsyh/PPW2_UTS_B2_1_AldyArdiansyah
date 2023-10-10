<?php

namespace App\Http\Controllers;

use App\Models\Pemain;
use Illuminate\Http\Request;

class PemainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_pemain = Pemain::all()->sortByDesc('id'); // Menggunakan variabel $pemain, bukan $p
        $no = 0;
        return view('pemain.index', compact('data_pemain', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pemain.create'); // Menampilkan formulir pembuatan pemain
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang masuk, lakukan penyimpanan jika valid
        $request->validate([
            // Atur aturan validasi sesuai kebutuhan Anda
        ]);

        Pemain::create([
            // Atur pengisian data ke tabel pemain sesuai kebutuhan Anda
        ]);

        return redirect()->route('pemain.index')
            ->withSuccess('Pemain berhasil disimpan.'); // Redirect kembali ke halaman indeks pemain dengan pesan sukses
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pemain = Pemain::find($id); // Mencari pemain berdasarkan ID
        return view('pemain.show', compact('pemain'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pemain = Pemain::find($id); // Mencari pemain berdasarkan ID
        return view('pemain.edit', compact('pemain'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data yang masuk, lakukan pembaruan jika valid
        $request->validate([
            // Atur aturan validasi sesuai kebutuhan Anda
        ]);

        $pemain = Pemain::find($id); // Mencari pemain berdasarkan ID
        $pemain->update([
            // Atur pembaruan data pemain sesuai kebutuhan Anda
        ]);

        return redirect()->route('pemain.index')
            ->withSuccess('Pemain berhasil diperbarui.'); // Redirect kembali ke halaman indeks pemain dengan pesan sukses
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pemain = Pemain::find($id); // Mencari pemain berdasarkan ID

        if ($pemain) {
            $pemain->delete(); // Menghapus pemain jika ditemukan
        }

        return redirect()->route('pemain.index')
            ->withSuccess('Pemain berhasil dihapus.'); // Redirect kembali ke halaman indeks pemain dengan pesan sukses
    }
}
