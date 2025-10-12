<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with(['department', 'position'])->latest()->paginate(10);
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();
        $positions = Position::all();
        return view('employees.create', compact('departments', 'positions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_lengkap' => 'required|string|max:100',
            'email' => 'required|email|unique:employees,email',
            'nomor_telepon' => 'required|string|max:15',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'tanggal_masuk' => 'required|date',
            'status' => 'required|in:aktif,nonaktif',
            'department_id' => 'required|exists:departments,id',
            'jabatan_id' => 'required|exists:positions,id',
        ]);
        Employee::create($request->all());
        return redirect()->route('employees.index')->with('success', 'Pegawai baru berhasil ditambahkan.');
    }

    public function show(Employee $employee)
    {
        // Laravel akan otomatis mencari data pegawai berdasarkan ID dari URL.
        // Kemudian, kirim data tersebut ke view 'employees.show'.
        return view('employees.show', compact('employee'));
    }
    public function edit(Employee $employee)
    {
        // Ambil semua data untuk mengisi dropdown
    $departments = Department::all();
    $positions = Position::all();

    // Kirim data pegawai, departemen, dan jabatan ke view
    return view('employees.edit', compact('employee', 'departments', 'positions'));
}

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name_lengkap' => 'required|string|max:100',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'nomor_telepon' => 'required|string|max:15',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'tanggal_masuk' => 'required|date',
            'status' => 'required|in:aktif,nonaktif',
            'department_id' => 'required|exists:departments,id',
            'jabatan_id' => 'required|exists:positions,id',
        ]);
        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success', 'Data pegawai berhasil diperbarui.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Data pegawai berhasil dihapus.');
    }
}
