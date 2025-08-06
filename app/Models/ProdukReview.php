<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukReview extends Model
{
    protected $table = 'produk_reviews';

    protected $primaryKey = 'review_id';

    protected $fillable = [
        'produk_id',
        'user_id',
        'rating',
        'komentar',
        'gambar',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
