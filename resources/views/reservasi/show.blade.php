@extends('layouts.main')

@section('title', 'Detail Reservasi')
@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Detail Reservasi</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-borderless">
                        <tr>
                            <th width="30%">Pelanggan</th>
                            <td>{{ $reservasi->pelanggan->nama }}</td>
                        </tr>
                        <tr>
                            <th>Mekanik</th>
                            <td>{{ $reservasi->mekanik->nama }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>{{ $reservasi->tanggal->format('d F Y') }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-borderless">
                        <tr>
                            <th width="30%">Jam</th>
                            <td>{{ $reservasi->jam }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <span class="badge 
                                    @if($reservasi->status == 'pending') bg-warning
                                    @elseif($reservasi->status == 'proses') bg-info
                                    @else bg-success
                                    @endif">
                                    {{ ucfirst($reservasi->status) }}
                                </span>
                            </td>
                        </tr>
                        @if($reservasi->keluhan)
                        <tr>
                            <th>Keluhan</th>
                            <td>{{ $reservasi->keluhan }}</td>
                        </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('reservasi.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('reservasi.edit', $reservasi->id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
        </div>
    </div>
</div>

@endsection