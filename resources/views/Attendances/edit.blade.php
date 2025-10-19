@extends('master')
@section('title', 'Edit Absensi')

@section('content')
<div class="card shadow-sm">
    <div class="card-header"><h3 class="card-title">Form Edit Absensi Karyawan</h3></div>
    <div class="card-body">
        <form action="{{ route('attendances.update', $attendance) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="karyawan_id" class="form-label">Nama Karyawan</label>
                <select name="karyawan_id" class="form-select @error('karyawan_id') is-invalid @enderror" required>
                    <option value="">Pilih Karyawan</option>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}" {{ old('karyawan_id', $attendance->karyawan_id) == $employee->id ? 'selected' : '' }}>
                            {{ $employee->name_lengkap }}
                        </option>
                    @endforeach
                </select>
                @error('karyawan_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', $attendance->tanggal) }}" required>
                @error('tanggal')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            {{-- WAKTU MASUK & KELUAR --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="waktu_masuk" class="form-label">Waktu Masuk</label>
                    <input type="time" name="waktu_masuk" class="form-control @error('waktu_masuk') is-invalid @enderror" value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}" required>
                    @error('waktu_masuk')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="waktu_keluar" class="form-label">Waktu Keluar (Opsional)</label>
                    <input type="time" name="waktu_keluar" class="form-control @error('waktu_keluar') is-invalid @enderror" value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}">
                    @error('waktu_keluar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            {{-- STATUS ABSENSI --}}
            <div class="mb-3">
                <label for="status_absensi" class="form-label">Status Kehadiran</label>
                <select name="status_absensi" class="form-select @error('status_absensi') is-invalid @enderror" required>
                    <option value="hadir" {{ old('status_absensi', $attendance->status_absensi) == 'hadir' ? 'selected' : '' }}>Hadir</option>
                    <option value="izin" {{ old('status_absensi', $attendance->status_absensi) == 'izin' ? 'selected' : '' }}>Izin</option>
                    <option value="sakit" {{ old('status_absensi', $attendance->status_absensi) == 'sakit' ? 'selected' : '' }}>Sakit</option>
                    <option value="alpha" {{ old('status_absensi', $attendance->status_absensi) == 'alpha' ? 'selected' : '' }}>Alpha</option>
                </select>
                @error('status_absensi')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('attendances.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
