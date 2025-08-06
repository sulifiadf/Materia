<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PosDetail extends Model
{
    protected $table = 'pos_details';

    protected $primaryKey = 'pos_detail_id';

    protected $fillable = [
        'pos_id',
        'produk_id',
        'jumlah',
        'harga',
        'subtotal',
    ];

    public function pos()
    {
        return $this->belongsTo(pos::class, 'pos_id');
    }
    
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
