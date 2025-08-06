<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    protected $table = 'karyawans';

    protected $primaryKey = 'karyawan_id';

    protected $fillable = [
        'nama',
        'email',
        'nomor_telepon',
        'alamat',
        'jabatan',
        'tanggal_masuk',
        'gaji',
        'status',
        'foto',
    ];

    public function absensi_karyawan()
    {
        return $this->hasMany(AbsensiKaryawan::class, 'karyawan_id');
    }

    
}
