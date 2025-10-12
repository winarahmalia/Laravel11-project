@extends('master')
@section('title', 'Daftar Gaji')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0">Daftar Gaji Karyawan</h3>
        <a href="{{ route('salaries.create') }}" class="btn btn-primary">Tambah Data Gaji</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Nama Karyawan</th>
                        <th>Bulan</th>
                        <th>Gaji Pokok</th>
                        <th>Total Gaji</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($salaries as $salary)
                        <tr>
                            <td>{{ $salary->employee->name_lengkap ?? 'N/A' }}</td>
                            <td>{{ $salary->bulan }}</td>
                            <td>Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('salaries.edit', $salary) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('salaries.destroy', $salary) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center">Tidak ada data gaji.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">{{ $salaries->links() }}</div>
    </div>
</div>
@endsection
