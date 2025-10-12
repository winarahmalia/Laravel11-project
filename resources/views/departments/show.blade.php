@extends('master')
@section('title', 'Detail Departemen')
@section('content')
  <div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Detail Departemen</h3>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label fw-bold">ID Departemen:</label>
            <p>{{ $department->id }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Nama Departemen:</label>
            <p>{{ $department->name }}</p>
        </div>
        <a href="{{ route('departments.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
