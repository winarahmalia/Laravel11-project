@extends('master')
@section('title', 'Tambah Data Gaji')

@section('content')
<div class="card shadow-sm">
    <div class="card-header"><h3 class="card-title">Form Tambah Data Gaji</h3></div>
    <div class="card-body">
        <form action="{{ route('salaries.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="karyawan_id" class="form-label">Nama Karyawan</label>
                <select name="karyawan_id" class="form-select @error('karyawan_id') is-invalid @enderror" required>
                    <option value="">Pilih Karyawan</option>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}" {{ old('karyawan_id') == $employee->id ? 'selected' : '' }}>{{ $employee->name_lengkap }}</option>
                    @endforeach
                </select>
                @error('karyawan_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="bulan" class="form-label">Bulan (Contoh: Okt-2025)</label>
                <input type="text" name="bulan" class="form-control @error('bulan') is-invalid @enderror" value="{{ old('bulan') }}" required>
                @error('bulan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                    <input type="number" name="gaji_pokok" class="form-control @error('gaji_pokok') is-invalid @enderror" value="{{ old('gaji_pokok') }}" required>
                    @error('gaji_pokok')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tunjangan" class="form-label">Tunjangan</label>
                    <input type="number" name="tunjangan" class="form-control @error('tunjangan') is-invalid @enderror" value="{{ old('tunjangan', 0) }}">
                    @error('tunjangan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="potongan" class="form-label">Potongan</label>
                    <input type="number" name="potongan" class="form-control @error('potongan') is-invalid @enderror" value="{{ old('potongan', 0) }}">
                    @error('potongan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="total_gaji" class="form-label">Total Gaji</label>
                    <input type="number" name="total_gaji" class="form-control @error('total_gaji') is-invalid @enderror" value="{{ old('total_gaji') }}" required>
                    @error('total_gaji')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
