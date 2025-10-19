<?php

namespace App\Http\Controllers;
use App\Models\Salary;
use App\Models\Employee;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index(Request $request)
{
    if ($request->wantsJson()) {
        return redirect()->route('salaries.index');
    }
    $salaries = Salary::with('employee')->latest()->paginate(15);
    return view('salaries.index', compact('salaries'));
}

    public function create()
    {
        $employees = Employee::all();
        return view('salaries.create', compact('employees'));
    }

    public function store(Request $request)
{
    $request->validate([
        'karyawan_id' => 'required|exists:employees,id',
        'bulan' => 'required|string|max:10',
        'gaji_pokok' => 'required|numeric|min:0|max:99999999.99',
        'tunjangan' => 'nullable|numeric|min:0|max:99999999.99',
        'potongan' => 'nullable|numeric|min:0|max:99999999.99',
        'total_gaji' => 'required|numeric|min:0|max:99999999.99',
    ]);

    Salary::create($request->all());
    return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil ditambahkan.');
}
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $salary = Salary::findOrFail($id);
        $employees = Employee::all();
        return view('salaries.edit', compact('salary', 'employees'));
    }

    public function update(Request $request, Salary $salary)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|string|max:10',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
            'total_gaji' => 'required|numeric|min:0',
        ]);

        $salary->update($request->all());
        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil diperbarui.');
    }
        public function destroy(Salary $salary)
    {
        $salary->delete();
        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil dihapus.');
    }
}
