<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
class EmployeeController extends Controller
{

    public function index()
    {
        $employees=Employee::latest()->paginate(5);
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
{

    $validatedData = $request->validate([
        'name_lengkap'  => 'required|string|max:255',
        'email'         => 'required|email|max:255|unique:employees',
        'nomor_telepon' => 'required|string|max:20',
        'tanggal_lahir' => 'required|date',
        'alamat'        => 'required|string|max:255',
        'tanggal_masuk' => 'required|date',
        'status'        => 'required|string|max:50',
    ]);
    Employee::create($validatedData);
    return redirect()->route('employees.index')
                     ->with('success', 'Data pegawai berhasil ditambahkan.');
}

    public function show(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    public function edit(string $id)
    {
        $employee = Employee::find($id);
        return view('employees.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Simpan hasil validasi ke dalam variabel
    $validatedData = $request->validate([
        'name_lengkap' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'nomor_telepon' => 'required|string|max:20',
        'tanggal_lahir' => 'required|date',
        'alamat' => 'required|string|max:255',
        'tanggal_masuk' => 'required|date',
        'status' => 'required|string|max:50',
    ]);
    $employee = Employee::findOrFail($id);
    $employee->update($validatedData);
    return redirect()->route('employees.index')
                     ->with('success', 'Data pegawai berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $employee = Employee::findOrFail($id);
    $employee->delete();

    return redirect()->route('employees.index')
                     ->with('success', 'Data pegawai berhasil dihapus.');
}
}
