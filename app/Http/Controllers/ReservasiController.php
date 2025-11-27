<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Pelanggan;
use App\Models\Mekanik;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
    {
        $reservasis = Reservasi::with(['pelanggan', 'mekanik'])->latest()->get();
        return view('reservasi.index', compact('reservasis'));
    }

    public function create()
    {
        return view('reservasi.create', [
            'pelanggans' => Pelanggan::all(),
            'mekaniks' => Mekanik::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'mekanik_id'   => 'required|exists:mekaniks,id',
            'tanggal'      => 'required|date|after_or_equal:today',
            'jam'          => 'required|date_format:H:i',
            'keluhan'      => 'nullable|string|max:500',
            'status'       => 'required|in:pending,proses,selesai',
        ]);

        Reservasi::create($validated);

        return redirect()->route('reservasi.index')
                         ->with('success', 'Reservasi berhasil ditambahkan!');
    }

    public function show($id)
    {
        $reservasi = Reservasi::with(['pelanggan', 'mekanik'])->findOrFail($id);
        return view('reservasi.show', compact('reservasi'));
    }

    public function edit($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        
        return view('reservasi.edit', [
            'reservasi' => $reservasi,
            'pelanggans' => Pelanggan::all(),
            'mekaniks' => Mekanik::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $reservasi = Reservasi::findOrFail($id);
        
        $validated = $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'mekanik_id'   => 'required|exists:mekaniks,id',
            'tanggal'      => 'required|date',
            'jam'          => 'required|date_format:H:i',
            'keluhan'      => 'nullable|string|max:500',
            'status'       => 'required|in:pending,proses,selesai',
        ]);

        $reservasi->update($validated);

        return redirect()->route('reservasi.index')
                         ->with('success', 'Reservasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        $reservasi->delete();

        return redirect()->route('reservasi.index')
                         ->with('success', 'Reservasi berhasil dihapus!');
    }
}