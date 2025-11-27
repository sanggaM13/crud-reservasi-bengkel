@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="container my-4" style="position: relative; z-index: 1;">
    <!-- Debug Info (Hanya tampil di development) -->
    @if(app()->environment('local'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>Debug Info:</strong> 
        Pelanggan: {{ $totalPelanggan }}, 
        Mekanik: {{ $totalMekanik }}, 
        Reservasi: {{ $totalReservasi }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Header -->
    <div class="row mb-5">
        <div class="col-lg-6 text-white" style="text-shadow: 0 2px 8px rgba(0,0,0,0.7);">
            <h1 class="display-5 fw-bold">Selamat Datang di Dashboard Bengkel Motor!</h1>
            <p class="lead">Pantau pelanggan setia, kelola tim mekanik profesional, dan atur reservasi servis motor dengan mudah dari satu tempat.</p>
        </div>
    </div>

    <!-- Cards Section -->
    <div class="row justify-content-center" id="dashboardContent">
        <div class="col-md-4 col-lg-3">
            <div class="card card-dashboard p-4 text-center">
                <div class="card-body">
                    <h4><i class="fas fa-users text-primary"></i> Total Pelanggan</h4>
                    <h2 class="text-primary" id="pelangganCount">{{ $totalPelanggan }}</h2>
                    <p class="text-muted">Pelanggan setia bengkel kami</p>
                    <button class="btn btn-primary btn-sm mt-2 show-overlay" data-target="pelangganTable">
                        <i class="fas fa-list me-1"></i> Lihat Pelanggan
                    </button>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-lg-3">
            <div class="card card-dashboard p-4 text-center">
                <div class="card-body">
                    <h4><i class="fas fa-tools text-warning"></i> Total Mekanik</h4>
                    <h2 class="text-warning" id="mekanikCount">{{ $totalMekanik }}</h2>
                    <p class="text-muted">Tim mekanik profesional siap membantu</p>
                    <button class="btn btn-warning btn-sm mt-2 show-overlay" data-target="mekanikTable">
                        <i class="fas fa-list me-1"></i> Lihat Mekanik
                    </button>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-lg-3">
            <div class="card card-dashboard p-4 text-center">
                <div class="card-body">
                    <h4><i class="fas fa-calendar-alt text-success"></i> Total Reservasi</h4>
                    <h2 class="text-success" id="reservasiCount">{{ $totalReservasi }}</h2>
                    <p class="text-muted">Reservasi servis yang sedang berjalan</p>
                    <button class="btn btn-success btn-sm mt-2 show-overlay" data-target="reservasiTable">
                        <i class="fas fa-list me-1"></i> Lihat Reservasi
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Overlay CRUD -->
<div class="overlay" id="overlay">
    <div class="overlay-content">
        <button class="btn btn-dark mb-3" id="closeOverlay">
            <i class="fas fa-times me-1"></i> Tutup
        </button>

        <!-- ================== PELANGGAN ================== -->
        <div id="pelangganTable" class="d-none">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4><i class="fas fa-users me-2"></i>Data Pelanggan</h4>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createPelangganModal">
                    <i class="fas fa-plus me-1"></i>Tambah Pelanggan
                </button>
            </div>
            
            @if($pelanggan->count() > 0)
            <div class="table-container">
                <table class="table table-striped table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th width="60">No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pelanggan as $index => $p)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td>{{ $p->no_hp }}</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('pelanggan.edit', $p->id) }}" class="btn btn-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('pelanggan.destroy', $p->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" onclick="return confirm('Hapus pelanggan {{ $p->nama }}?')" 
                                                class="btn btn-danger" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle me-2"></i>Belum ada data pelanggan.
                <br>
                <a href="{{ route('pelanggan.create') }}" class="btn btn-primary btn-sm mt-2">
                    <i class="fas fa-plus me-1"></i>Tambah Pelanggan Pertama
                </a>
            </div>
            @endif
        </div>

        <!-- ================== MEKANIK ================== -->
        <div id="mekanikTable" class="d-none">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4><i class="fas fa-tools me-2"></i>Data Mekanik</h4>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createMekanikModal">
                    <i class="fas fa-plus me-1"></i>Tambah Mekanik
                </button>
            </div>
            
            @if($mekanik->count() > 0)
            <div class="table-container">
                <table class="table table-striped table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th width="60">No</th>
                            <th>Nama</th>
                            <th>Keahlian</th>
                            <th>No HP</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mekanik as $index => $m)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $m->nama }}</td>
                            <td>{{ $m->keahlian }}</td>
                            <td>{{ $m->no_hp }}</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('mekanik.edit', $m->id) }}" class="btn btn-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('mekanik.destroy', $m->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" onclick="return confirm('Hapus mekanik {{ $m->nama }}?')" 
                                                class="btn btn-danger" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle me-2"></i>Belum ada data mekanik.
                <br>
                <a href="{{ route('mekanik.create') }}" class="btn btn-primary btn-sm mt-2">
                    <i class="fas fa-plus me-1"></i>Tambah Mekanik Pertama
                </a>
            </div>
            @endif
        </div>

        <!-- ================== RESERVASI ================== -->
        <div id="reservasiTable" class="d-none">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4><i class="fas fa-calendar-alt me-2"></i>Data Reservasi</h4>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createReservasiModal">
                    <i class="fas fa-plus me-1"></i>Tambah Reservasi
                </button>
            </div>
            
            @if($reservasi->count() > 0)
            <div class="table-container">
                <table class="table table-striped table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th width="60">No</th>
                            <th>Pelanggan</th>
                            <th>Mekanik</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Status</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservasi as $index => $r)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $r->pelanggan->nama ?? 'N/A' }}</td>
                            <td>{{ $r->mekanik->nama ?? 'N/A' }}</td>
                            <td>{{ \Carbon\Carbon::parse($r->tanggal)->format('d/m/Y') }}</td>
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
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('reservasi.edit', $r->id) }}" class="btn btn-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('reservasi.destroy', $r->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" onclick="return confirm('Hapus reservasi ini?')" 
                                                class="btn btn-danger" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle me-2"></i>Belum ada data reservasi.
                <br>
                <a href="{{ route('reservasi.create') }}" class="btn btn-primary btn-sm mt-2">
                    <i class="fas fa-plus me-1"></i>Tambah Reservasi Pertama
                </a>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Include Modals -->
@include('dashboard.modals')

@push('scripts')
<script>
$(document).ready(function(){
    console.log('Dashboard Data:', {
        pelanggan: {{ $totalPelanggan }},
        mekanik: {{ $totalMekanik }},
        reservasi: {{ $totalReservasi }}
    });

    // Overlay functionality
    $('.show-overlay').click(function(){
        let target = $(this).data('target');
        $('#overlay .overlay-content > div').addClass('d-none');
        $('#' + target).removeClass('d-none');
        $('#overlay').fadeIn();
        $('#dashboardContent').addClass('blur-bg');
        $('body').css('overflow', 'hidden');
    });

    $('#closeOverlay').click(function(){
        $('#overlay').fadeOut();
        $('#dashboardContent').removeClass('blur-bg');
        $('body').css('overflow', 'auto');
    });

    $(document).on('click', function(e) {
        if ($(e.target).hasClass('overlay')) {
            $('#overlay').fadeOut();
            $('#dashboardContent').removeClass('blur-bg');
            $('body').css('overflow', 'auto');
        }
    });

    $(document).keyup(function(e) {
        if (e.keyCode === 27) {
            $('#overlay').fadeOut();
            $('#dashboardContent').removeClass('blur-bg');
            $('body').css('overflow', 'auto');
        }
    });
});
</script>
@endpush

@endsection