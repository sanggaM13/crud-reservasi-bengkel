<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::latest()->get();
        return view('pelanggan.index', compact('pelanggans'));
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string|max:200',
            'no_hp' => 'required|string|max:15',
        ]);

        Pelanggan::create($validated);

        return redirect()->route('pelanggan.index')
                         ->with('success', 'Pelanggan berhasil ditambahkan!');
    }

    public function show($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.show', compact('pelanggan'));
    }

    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string|max:200',
            'no_hp' => 'required|string|max:15',
        ]);

        $pelanggan->update($validated);

        return redirect()->route('pelanggan.index')
                         ->with('success', 'Pelanggan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')
                         ->with('success', 'Pelanggan berhasil dihapus!');
    }
}