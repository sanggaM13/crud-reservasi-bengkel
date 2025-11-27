<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Mekanik;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            // Debug: Check if models exist and can query
            \Log::info('=== DASHBOARD DEBUG START ===');
            
            // Check table existence
            $pelangganTable = \DB::select("SHOW TABLES LIKE 'pelanggans'");
            $mekanikTable = \DB::select("SHOW TABLES LIKE 'mekaniks'");
            $reservasiTable = \DB::select("SHOW TABLES LIKE 'reservasis'");
            
            \Log::info('Table check:', [
                'pelanggans' => !empty($pelangganTable),
                'mekaniks' => !empty($mekanikTable),
                'reservasis' => !empty($reservasiTable)
            ]);

            // Get counts with raw SQL for debugging
            $totalPelanggan = Pelanggan::count();
            $totalMekanik = Mekanik::count();
            $totalReservasi = Reservasi::count();

            // Raw SQL counts for comparison
            $rawPelanggan = \DB::table('pelanggans')->count();
            $rawMekanik = \DB::table('mekaniks')->count();
            $rawReservasi = \DB::table('reservasis')->count();

            \Log::info('Count comparison:', [
                'pelanggan_eloquent' => $totalPelanggan,
                'pelanggan_raw' => $rawPelanggan,
                'mekanik_eloquent' => $totalMekanik,
                'mekanik_raw' => $rawMekanik,
                'reservasi_eloquent' => $totalReservasi,
                'reservasi_raw' => $rawReservasi
            ]);

            // Check if there are any records in each table
            $pelangganRecords = \DB::table('pelanggans')->get();
            $mekanikRecords = \DB::table('mekaniks')->get();
            $reservasiRecords = \DB::table('reservasis')->get();

            \Log::info('Record counts:', [
                'pelanggan_records' => $pelangganRecords->count(),
                'mekanik_records' => $mekanikRecords->count(),
                'reservasi_records' => $reservasiRecords->count()
            ]);

            // Get all data for tables with relationships
            $pelangganData = Pelanggan::all();
            $mekanikData = Mekanik::all();
            $reservasiData = Reservasi::with(['pelanggan', 'mekanik'])->latest()->get();

            \Log::info('Data loaded:', [
                'pelanggan_data_count' => $pelangganData->count(),
                'mekanik_data_count' => $mekanikData->count(),
                'reservasi_data_count' => $reservasiData->count()
            ]);

            \Log::info('=== DASHBOARD DEBUG END ===');

            return view('dashboard.index', [
                'totalPelanggan' => $totalPelanggan,
                'totalMekanik'   => $totalMekanik,
                'totalReservasi' => $totalReservasi,
                'pelanggan'      => $pelangganData,
                'mekanik'        => $mekanikData,
                'reservasi'      => $reservasiData
            ]);

        } catch (\Exception $e) {
            \Log::error('Dashboard Error: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return view('dashboard.index', [
                'totalPelanggan' => 0,
                'totalMekanik'   => 0,
                'totalReservasi' => 0,
                'pelanggan'      => collect(),
                'mekanik'        => collect(),
                'reservasi'      => collect()
            ])->with('error', 'Terjadi kesalahan saat memuat data: ' . $e->getMessage());
        }
    }
}