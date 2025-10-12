@extends('master')
@section('title', 'Tambah Departemen')
@section('content')
<div class="card shadow-sm"><div class="card-header"><h3 class="card-title">Form Tambah Departemen</h3></div>
    <div class="card-body">
        <form action="{{ route('departments.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_departments" class="form-label">Nama Departemen</label>
                <input type="text" name="nama_departments" class="form-control @error('nama_departments') is-invalid @enderror" value="{{ old('nama_departments') }}" required>
                @error('nama_departments')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('departments.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
