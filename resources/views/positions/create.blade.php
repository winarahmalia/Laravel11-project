@extends('master')
@section('title', 'Tambah Jabatan')

@section('content')
<div class="card shadow-sm">
    <div class="card-header"><h3 class="card-title">Form Tambah Jabatan</h3></div>
    <div class="card-body">
        <form action="{{ route('positions.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                <input type="text" name="nama_jabatan" class="form-control @error('nama_jabatan') is-invalid @enderror" value="{{ old('nama_jabatan') }}" required>
                @error('nama_jabatan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                <input type="number" name="gaji_pokok" class="form-control @error('gaji_pokok') is-invalid @enderror" value="{{ old('gaji_pokok') }}" required step="0.01">
                @error('gaji_pokok')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('positions.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
