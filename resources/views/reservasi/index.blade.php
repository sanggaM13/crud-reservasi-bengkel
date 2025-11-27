@extends('layouts.main')

@section('title', 'Data Reservasi')
@section('content')

<div class="container mt-4">
    <h2>Daftar Reservasi</h2>
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('reservasi.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Reservasi
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Pelanggan</th>
                            <th>Mekanik</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reservasis as $index => $r)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $r->pelanggan->nama }}</td>
                            <td>{{ $r->mekanik->nama }}</td>
                            <td>{{ $r->tanggal->format('d/m/Y') }}</td>
                            <td>{{ $r->jam }}</td>
                            <td>
                                <span class="badge 
                                    @if($r->status == 'pending') bg-warning
                                    @elseif($r->status == 'proses') bg-info
                                    @else bg-success
                                    @endif">
                                    {{ ucfirst($r->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('reservasi.show', $r->id) }}" class="btn btn-info btn-sm" 
                                       title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('reservasi.edit', $r->id) }}" class="btn btn-warning btn-sm" 
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('reservasi.destroy', $r->id) }}" method="POST" 
                                          class="d-inline" onsubmit="return confirm('Yakin ingin menghapus reservasi?')">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data reservasi</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection