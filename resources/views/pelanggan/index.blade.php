@extends('layouts.main')

@section('title', 'Data Pelanggan')
@section('headline', 'Daftar Pelanggan')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h4>Data Pelanggan</h4>
    <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">
        + Tambah Pelanggan
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nama</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th width="150px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pelanggans as $p)
                <tr>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->no_hp }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>
                        <a href="{{ route('pelanggan.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('pelanggan.destroy', $p->id) }}" 
                              method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Hapus pelanggan ini?')" 
                                    class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">
                        Belum ada data pelanggan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
