@extends('layouts.main')

@section('content')
<h3 class="mb-4 fw-bold">Data Mekanik</h3>

<a href="{{ route('mekanik.create') }}" class="btn btn-dark mb-3">+ Tambah Mekanik</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Keahlian</th>
            <th>No HP</th>
            <th width="150">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mekanik as $m)
        <tr>
            <td>{{ $m->nama }}</td>
            <td>{{ $m->keahlian }}</td>
            <td>{{ $m->no_hp }}</td>
            <td>
                <a href="{{ route('mekanik.edit', $m->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('mekanik.destroy', $m->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin hapus?')">Hapus</button>
                        @foreach ($mekanik as $m)
<tr>
    <td>{{ $m->nama }}</td>
    <td>{{ $m->keahlian }}</td>
    <td>{{ $m->no_hp }}</td>
    <td>
        <a href="{{ route('mekanik.edit', $m->id) }}" class="btn btn-warning btn-sm">Edit</a>

        <form action="{{ route('mekanik.destroy', $m->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">Hapus</button>
        </form>
    </td>
</tr>
@endforeach

                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
