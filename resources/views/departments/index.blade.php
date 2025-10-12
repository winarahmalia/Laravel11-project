@extends('master')
@section('title', 'Daftar Departemen')
@section('content')
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Daftar Departemen</h3>
            <a href="{{ route('departments.create') }}" class="btn btn-primary">Tambah Baru</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-dark"><tr><th>Nama Departemen</th><th style="width: 150px;">Aksi</th></tr></thead>
                <tbody>
                    @forelse ($departments as $department)
                        <tr>
                            <td>{{ $department->nama_departments }}</td>
                            <td>
                                <a href="{{ route('departments.edit', $department) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('departments.destroy', $department) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="2" class="text-center">Tidak ada data.</td></tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-3">{{ $departments->links() }}</div>
        </div>
    </div>
@endsection
