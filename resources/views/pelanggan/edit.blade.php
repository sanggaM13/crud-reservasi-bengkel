@extends('layouts.main')

@section('title', 'Edit Pelanggan')
@section('headline', 'Edit Data Pelanggan')

@section('content')

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $pelanggan->nama }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">No HP</label>
                <input type="text" name="no_hp" class="form-control" value="{{ $pelanggan->no_hp }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" rows="3" required>{{ $pelanggan->alamat }}</textarea>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Batal</a>
        </form>

    </div>
</div>

@endsection
