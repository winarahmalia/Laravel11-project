@extends('master')
@section('title', 'Edit Departemen')
@section('content')
<div class="card shadow-sm">
    <div class="card-header"><h3 class="card-title">Form Edit Departemen</h3></div>
    <div class="card-body">
        <form action="{{ route('departments.update', $department) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                {{-- UBAH 'for' DI SINI --}}
                <label for="nama_departments" class="form-label">Nama Departemen</label>

                {{-- UBAH 'name' DAN 'value' DI SINI --}}
                <input type="text" name="nama_departments" class="form-control @error('nama_departments') is-invalid @enderror" value="{{ old('nama_departments', $department->nama_departments) }}" required>

                {{-- UBAH NAMA DI @error --}}
                @error('nama_departments')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('departments.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
