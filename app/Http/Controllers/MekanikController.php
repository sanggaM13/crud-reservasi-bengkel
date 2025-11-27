<?php

namespace App\Http\Controllers;

use App\Models\Mekanik;
use Illuminate\Http\Request;

class MekanikController extends Controller
{
    public function index()
    {
        $mekaniks = Mekanik::latest()->get();
        return view('mekanik.index', compact('mekaniks'));
    }

    public function create()
    {
        return view('mekanik.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'keahlian' => 'required|string|max:100',
            'no_hp' => 'required|string|max:15',
        ]);

        Mekanik::create($validated);

        return redirect()->route('mekanik.index')
                         ->with('success', 'Mekanik berhasil ditambahkan!');
    }

    public function show($id)
    {
        $mekanik = Mekanik::findOrFail($id);
        return view('mekanik.show', compact('mekanik'));
    }

    public function edit($id)
    {
        $mekanik = Mekanik::findOrFail($id);
        return view('mekanik.edit', compact('mekanik'));
    }

    public function update(Request $request, $id)
    {
        $mekanik = Mekanik::findOrFail($id);
        
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'keahlian' => 'required|string|max:100',
            'no_hp' => 'required|string|max:15',
        ]);

        $mekanik->update($validated);

        return redirect()->route('mekanik.index')
                         ->with('success', 'Mekanik berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $mekanik = Mekanik::findOrFail($id);
        $mekanik->delete();

        return redirect()->route('mekanik.index')
                         ->with('success', 'Mekanik berhasil dihapus!');
    }
}