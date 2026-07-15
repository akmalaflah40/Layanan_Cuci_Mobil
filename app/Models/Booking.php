<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'no_hp',
        'alamat',
        'kendaraan',
        'service_id',
        'total_harga',
        'tanggal_booking',
        'jam_booking',
        'catatan',
        'status'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    
}