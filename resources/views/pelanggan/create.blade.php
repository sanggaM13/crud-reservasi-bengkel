@extends('layouts.main')

@section('title', 'Tambah Pelanggan')
@section('headline', 'Form Tambah Pelanggan')

@section('content')

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('pelanggan.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">No HP</label>
                <input type="text" name="no_hp" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" rows="3" required></textarea>
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>

    </div>
</div>

@endsection
