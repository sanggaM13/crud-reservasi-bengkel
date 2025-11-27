<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;
    
    // Pastikan nama tabel sesuai
    protected $table = 'reservasis';
    
    protected $fillable = [
        'pelanggan_id',
        'mekanik_id',
        'tanggal',
        'jam',
        'keluhan',
        'status'
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function mekanik()
    {
        return $this->belongsTo(Mekanik::class);
    }
}