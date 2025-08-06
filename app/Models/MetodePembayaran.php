<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetodePembayaran extends Model
{
    protected $table = 'metode_pembayarans';

    protected $primaryKey = 'metode_pembayaran_id';

    protected $fillable = [
        'nama_metode',
    ];

    public function orders()
    {
        return $this->hasMany(orders::class, 'metode_pembayaran_id');
    }

    
}
