@extends('master')
@section('title', 'Daftar Pegawai')

@section('content')
<div class="card shadow-sm">
    {{-- HEADER CARD: Berisi Judul dan Tombol Tambah --}}
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0">Daftar Pegawai</h3>
        {{-- Tombol 'Tambah' yang lebih menonjol dan memperbaiki typo 'herf' menjadi 'href' --}}
        <a href="{{ route('employees.create') }}" class="btn btn-primary">Tambah Pegawai</a>
    </div>

    {{-- BODY CARD: Berisi Tabel Data --}}
    <div class="card-body">
        <div class="table-responsive">
            {{-- Menggunakan kelas Bootstrap untuk styling tabel --}}
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Nomor Telepon</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Tanggal Masuk</th>
                        <th>Status</th>
                        <th style="width: 200px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Menggunakan @forelse untuk menangani kasus jika data kosong --}}
                    @forelse ($employees as $employee)
                        <tr>
                            <td>{{ $employee->name_lengkap }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->nomor_telepon }}</td>
                            {{-- Format tanggal agar lebih mudah dibaca --}}
                            <td>{{ \Carbon\Carbon::parse($employee->tanggal_lahir)->format('d M Y') }}</td>
                            <td>{{ $employee->alamat }}</td>
                            <td>{{ \Carbon\Carbon::parse($employee->tanggal_masuk)->format('d M Y') }}</td>
                            <td>
                                {{-- Menggunakan Badge untuk status agar lebih menarik --}}
                                <span class="badge {{ $employee->status == 'aktif' ? 'bg-success' : 'bg-danger' }}">
                                    {{ ucfirst($employee->status) }}
                                </span>
                            </td>
                            <td>
                                {{-- Mengubah link Aksi menjadi tombol kecil --}}
                                <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-sm btn-info">Detail</a>
                                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Belum ada data pegawai.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $employees->links() }}
        </div>
    </div>
</div>
@endsection
