<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::latest()->paginate(10);
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
{
    $request->validate([
        // PASTIKAN NAMA INI BENAR (dengan 's')
        'nama_departments' => 'required|string|max:100|unique:departments,nama_departments'
    ]);

    Department::create($request->all());

    return redirect()->route('departments.index')
                     ->with('success', 'Departemen baru berhasil ditambahkan.');
}

    public function show(Department $department)
    {
        return view('departments.show', compact('department'));
    }

    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $request->validate(['nama_departments' => 'required|string|max:100|unique:departments,nama_departments,' . $department->id]);
        $department->update($request->all());
        return redirect()->route('departments.index')->with('success', 'Departemen berhasil diperbarui.');
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Departemen berhasil dihapus.');
    }
}
