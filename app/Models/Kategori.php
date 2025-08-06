<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;


class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoris';

    protected $primaryKey = 'kategori_id';

    protected $fillable = [
        'nama_kategori',
        'slug',
    ];

    public $timestamps = true;

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($kategori){
            if (empty($kategori->slug)) {
                $kategori->slug = Str::slug($kategori->nama_kategori);
            }
        });

        static::updating(function ($kategori){
        if($kategori->isDirty('nama_kategori') && empty($kategori->slug)){
            $kategori->slug = Str::slug($kategori->nama_kategori);
        }
    });
    }

    public function setNamaKategoriAttribute($value)
    {
        $this->attributes['nama_kategori'] = $value;

        if (empty($this->attributes['slug'])) {
            $this->attributes['slug'] = Str::slug($value);
        }
    }
    
    public function scopeBySlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }

    public function scopeByNama($query, $nama)
    {
        return $query->where('nama_kategori', 'like', '%' . $nama . '%');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }

    public function hasContent()
    {
        // Contoh jika ada relasi dengan posts atau products
        // return $this->posts()->exists() || $this->products()->exists();
        return false;
    }

    public function getUrlAttribute()
    {
        return route('kategori.show', $this->slug);
    }

}
