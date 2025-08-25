<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $table = 'produks';

    protected $primaryKey = 'produk_id';

    protected $fillable = [
        'kategori_id',
        'promo_id',
        'nama_produk',
        'deskripsi',
        'harga_beli',
        'harga_jual',
        'stok',
        'satuan',
        'berat',
        'merk',
        'foto_produk',
        'status',
        'slug',
    ];

    protected function casts(): array
    {
        return [
            'harga_beli' => 'decimal:2',
            'harga_jual' => 'decimal:2',
            'stok' => 'integer',
            'berat' => 'decimal:2',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'foto_produk' => 'array',
        ];
    }

    protected $attributes = [
        'stok' => 0,
        'status' => 'tersedia',
    ];

    //untuk auto mengenerate slug dan update status
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($produk){
            if (empty($produk->slug)) {
                $produk->slug = static::generateUniqueSlug($produk->nama_produk);}

            $produk->status = $produk->stok > 0 ? 'tersedia' : 'kosong';
        });

        static::updating(function ($produk){
            if($produk->isDirty('nama_produk')&& empty ($produk->slug)){
                $produk->slug = static::generateUniqueSlug($produk->nama_produk);
            }

            if ($produk->isDirty('stok')) {
                $produk->status = $produk->stok > 0 ? 'tersedia' : 'kosong';
            }

        });
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function promo()
    {
        return $this->belongsTo(Promo::class, 'promo_id');
    }

    public function OrderItems()
    {
        return $this->hasMany(OrderItem::class, 'produk_id');
    }

    public function Keranjang()
    {
        return $this->hasMany(Keranjang::class, 'produk_id');
    }

    public function scopeTersedia($query)
    {
        return $query->where('status', 'tersedia');
    }

    public function scopeKosong($query)
    {
        return $query->where('status', 'kosong');
    }

    public function scopeBySluq($query, $slug)
    {
        return $this->where('slug', $slug);
    }

    public function scopeSearch($query, $nama)
    {
        return $this->where('nama_produk', 'like', '%' . $nama . '%');
    }

    public function scopeByPriceRange($query, $minprice = null, $maxprice = null)
    {
        if ($minprice) {
            $query->where('harga_jual', '>=', $minprice);
        }
        if ($maxprice){
            $query->where('harga_jual', '<=', $maxprice);
        }
        return $query;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    

}
