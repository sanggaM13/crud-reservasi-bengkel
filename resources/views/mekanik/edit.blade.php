@extends('layouts.main')

@section('content')
<h3 class="mb-4 fw-bold">Edit Mekanik</h3>

<form action="{{ route('mekanik.update', $mekanik->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama Mekanik</label>
        <input type="text" name="nama" class="form-control" value="{{ $mekanik->nama }}" required>
    </div>

    <div class="mb-3">
        <label>Keahlian</label>
        <input type="text" name="keahlian" class="form-control" value="{{ $mekanik->keahlian }}" required>
    </div>

    <div class="mb-3">
        <label>No HP</label>
        <input type="text" name="no_hp" class="form-control" value="{{ $mekanik->no_hp }}" required>
    </div>

    <button class="btn btn-dark">Update</button>
</form>
@endsection
