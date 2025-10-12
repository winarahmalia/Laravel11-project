<?php

namespace App\Http\Controllers;

use App\Models\Position; // Import model Position
use Illuminate\Http\Request;

class PositionController extends Controller
{
    // MENAMPILKAN SEMUA DATA JABATAN
    public function index()
    {
        $positions = Position::latest()->paginate(10);
        return view('positions.index', compact('positions'));
    }

    // MENAMPILKAN FORM TAMBAH
    public function create()
    {
        return view('positions.create');
    }

    // MENYIMPAN DATA BARU
    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:100|unique:positions,nama_jabatan',
            'gaji_pokok' => 'required|numeric|min:0',
        ]);

        Position::create($request->all());

        return redirect()->route('positions.index')->with('success', 'Jabatan baru berhasil ditambahkan.');
    }

    // MENAMPILKAN FORM EDIT
    public function edit(Position $position)
    {
        return view('positions.edit', compact('position'));
    }

    // MENGUPDATE DATA
    public function update(Request $request, Position $position)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:100|unique:positions,nama_jabatan,' . $position->id,
            'gaji_pokok' => 'required|numeric|min:0',
        ]);

        $position->update($request->all());

        return redirect()->route('positions.index')->with('success', 'Data jabatan berhasil diperbarui.');
    }

    // MENGHAPUS DATA
    public function destroy(Position $position)
    {
        $position->delete();
        return redirect()->route('positions.index')->with('success', 'Data jabatan berhasil dihapus.');
    }
}
