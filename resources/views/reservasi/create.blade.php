@extends('layouts.main')

@section('title', 'Tambah Reservasi')
@section('content')

<div class="container mt-4">
    <h2>Form Tambah Reservasi</h2>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('reservasi.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Pelanggan</label>
            <select name="pelanggan_id" class="form-control @error('pelanggan_id') is-invalid @enderror" required>
                <option value="">-- Pilih Pelanggan --</option>
                @foreach($pelanggans as $p)
                    <option value="{{ $p->id }}" {{ old('pelanggan_id') == $p->id ? 'selected' : '' }}>
                        {{ $p->nama }}
                    </option>
                @endforeach
            </select>
            @error('pelanggan_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Mekanik</label>
            <select name="mekanik_id" class="form-control @error('mekanik_id') is-invalid @enderror" required>
                <option value="">-- Pilih Mekanik --</option>
                @foreach($mekaniks as $m)
                    <option value="{{ $m->id }}" {{ old('mekanik_id') == $m->id ? 'selected' : '' }}>
                        {{ $m->nama }}
                    </option>
                @endforeach
            </select>
            @error('mekanik_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" 
                   value="{{ old('tanggal') }}" min="{{ date('Y-m-d') }}" required>
            @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Jam</label>
            <input type="time" name="jam" class="form-control @error('jam') is-invalid @enderror" 
                   value="{{ old('jam') }}" required>
            @error('jam')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Keluhan</label>
            <textarea name="keluhan" class="form-control @error('keluhan') is-invalid @enderror" 
                      rows="3" placeholder="Masukkan keluhan kendaraan">{{ old('keluhan') }}</textarea>
            @error('keluhan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="proses" {{ old('status') == 'proses' ? 'selected' : '' }}>Proses</option>
                <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('reservasi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

@endsection