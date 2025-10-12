@extends('master')
@section('title', 'Detail Pegawai')

@section('content')
<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Detail Pegawai: {{ $employee->name_lengkap }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            {{-- KOLOM KIRI: DATA PRIBADI --}}
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Lengkap:</label>
                    <p>{{ $employee->name_lengkap }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Email:</label>
                    <p>{{ $employee->email }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Nomor Telepon:</label>
                    <p>{{ $employee->nomor_telepon }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Tanggal Lahir:</label>
                    <p>{{ \Carbon\Carbon::parse($employee->tanggal_lahir)->format('d F Y') }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Alamat:</label>
                    <p>{{ $employee->alamat }}</p>
                </div>
            </div>

            {{-- KOLOM KANAN: DATA PEKERJAAN --}}
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label fw-bold">Departemen:</label>
                    {{-- Menampilkan nama departemen dari relasi --}}
                    <p>{{ $employee->department->nama_departments ?? 'N/A' }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Jabatan:</label>
                    {{-- Menampilkan nama jabatan dari relasi --}}
                    <p>{{ $employee->position->nama_jabatan ?? 'N/A' }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Tanggal Masuk:</label>
                    <p>{{ \Carbon\Carbon::parse($employee->tanggal_masuk)->format('d F Y') }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Status:</label>
                    <p>
                        <span class="badge {{ $employee->status == 'aktif' ? 'bg-success' : 'bg-danger' }}">
                            {{ ucfirst($employee->status) }}
                        </span>
                    </p>
                </div>
            </div>
        </div>
        <hr>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">Edit Pegawai</a>
    </div>
</div>
@endsection
