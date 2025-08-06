<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbsensiKaryawan extends Model
{
    protected $table = 'absensi_karyawans';

    protected $primaryKey = 'absensi_id';

    protected $fillable = [
        'karyawan_id',
        'tanggal',
        'jam_masuk',
        'jam_keluar',
        'status',
        'catatan',
    ];

    public function karyawan()
    {
        return $this->belongsTo(karyawan::class, 'karyawan_id');
    }
    
}
