@extends('layouts.main')

@section('title', 'Edit Reservasi')
@section('content')

<div class="container mt-4">
    <h2>Edit Reservasi</h2>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('reservasi.update', $reservasi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Pelanggan</label>
            <select name="pelanggan_id" class="form-control @error('pelanggan_id') is-invalid @enderror" required>
                <option value="">-- Pilih Pelanggan --</option>
                @foreach($pelanggans as $p)
                    <option value="{{ $p->id }}" {{ $reservasi->pelanggan_id == $p->id ? 'selected' : '' }}>
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
                    <option value="{{ $m->id }}" {{ $reservasi->mekanik_id == $m->id ? 'selected' : '' }}>
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
                   value="{{ $reservasi->tanggal->format('Y-m-d') }}" required>
            @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Jam</label>
            <input type="time" name="jam" class="form-control @error('jam') is-invalid @enderror" 
                   value="{{ $reservasi->jam }}" required>
            @error('jam')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Keluhan</label>
            <textarea name="keluhan" class="form-control @error('keluhan') is-invalid @enderror" 
                      rows="3" placeholder="Masukkan keluhan kendaraan">{{ $reservasi->keluhan }}</textarea>
            @error('keluhan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                <option value="pending" {{ $reservasi->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="proses" {{ $reservasi->status == 'proses' ? 'selected' : '' }}>Proses</option>
                <option value="selesai" {{ $reservasi->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('reservasi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

@endsection