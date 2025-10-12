@extends('master')
@section('title','Daftar Jabatan')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0">Daftar Jabatan</h3>
        <a href="{{ route('positions.create') }}" class="btn btn-primary">Tambah Jabatan</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nama Jabatan</th>
                    <th>Gaji Pokok</th>
                    <th style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($positions as $position)
                    <tr>
                        <td>{{ $position->nama_jabatan }}</td>
                        <td>Rp {{ number_format($position->gaji_pokok, 6, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('positions.edit', $position) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('positions.destroy', $position) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="text-center">Tidak ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-3">{{ $positions->links() }}</div>
    </div>
</div>
@endsection
