<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mekanik extends Model
{
    use HasFactory;
    
    protected $fillable = ['nama', 'keahlian', 'no_hp'];
    
    public function reservasis()
    {
        return $this->hasMany(Reservasi::class);
    }
}