@extends('master')
@section('title', 'Daftar Absensi')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0">Daftar Absensi Karyawan</h3>
        <a href="{{ route('attendances.create') }}" class="btn btn-primary">Catat Absensi</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Nama Karyawan</th>
                        <th>Tanggal</th>
                        <th>Waktu Masuk</th>
                        <th>Waktu Keluar</th>
                        <th>Status</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($attendances as $attendance)
                        <tr>
                            <td>{{ $attendance->employee->name_lengkap ?? 'N/A' }}</td>
                            <td>{{ \Carbon\Carbon::parse($attendance->tanggal)->format('d M Y') }}</td>
                            <td>{{ $attendance->waktu_masuk }}</td>
                            <td>{{ $attendance->waktu_keluar ?? '-' }}</td>
                            <td>
                                <span class="badge
                                    @if($attendance->status_absensi == 'hadir') bg-success
                                    @elseif($attendance->status_absensi == 'sakit' || $attendance->status_absensi == 'izin') bg-warning
                                    @else bg-danger @endif">
                                    {{ ucfirst($attendance->status_absensi) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('attendances.edit', $attendance) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('attendances.destroy', $attendance) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center">Tidak ada data absensi.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">{{ $attendances->links() }}</div>
    </div>
</div>
@endsection
