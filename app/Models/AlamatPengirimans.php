<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class AlamatPengirimans extends Model
{
    protected $table = 'alamat_pengirimans';

    protected $primaryKey = 'alamat_pengiriman_id';

    protected $fillable = [
        'user_id',
        'label',
        'nama_penerima',
        'nomor_telepon',
        'alamat',
        'kota',
        'provinsi',
        'kode_pos',
        'is_default',
    ];

    protected function casts(): array
    {
        return [
            'is_default' => 'boolean',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    protected $attributes = [
        'is_default' => false,
    ];

    protected static function boot()
    {
        parent::boot();

        //membuat alamat baru sebagai default
        static::creating(function ($alamat){
            if ($alamat->is_default) {
                //semua alamat lainnya tidak default
                static::where('user_id', $alamat->user_id)
                    ->update(['is_default' => false]);
            }
        });

        //update alamat menjadi default
        static::updating(function ($alamat){
            if($alamat->is_default && $alamat->isDirty('is_default')){
                //semua alamat lainnya tidak default
                static::where('user_id', $alamat->user_id)
                    ->where('alamat_pengiriman_id', '!=', $alamat->alamat_pengiriman_id)
                    ->update(['is_default' => false]);
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeDefault($query, $userId)
    {
        return $query->where('user_id', $userId)
            ->where('is_default', true)
            ->first();
    }

    public function getAlamatLengkapAttribute()
    {
        $alamatLengkap = $this->alamat. ', ' . $this->kota. ', ' . $this->provinsi;
        if ($this->kode_pos) {
            $alamatLengkap .= ', ' . $this->kode_pos;
        }
        return $alamatLengkap;
    }

    public function setAlamatDefault()
    {
        $this->where('user_id', $this->user_id)
            ->where('alamat_pengiriman_id', '!=', $this->alamat_pengiriman_id)
            ->update(['is_default' => false]);

        
        //set alamat menjadi default
        return $this->update(['is_default' => true]);
    }

    public function isDefault()
    {
        return $this->is_default;
    }


}
