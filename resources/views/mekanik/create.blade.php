@extends('layouts.main')

@section('content')
<h3 class="mb-4 fw-bold">Tambah Mekanik</h3>

<form action="{{ route('mekanik.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Nama Mekanik</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Keahlian</label>
        <input type="text" name="keahlian" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>No HP</label>
        <input type="text" name="no_hp" class="form-control" required>
    </div>

    <button class="btn btn-dark">Simpan</button>
</form>
@endsection
