<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'stock',
        'badge', 'category', 'images', 'video', 'is_active', 'is_featured'
    ];

    protected $casts = [
        'images'      => 'array',
        'is_active'   => 'boolean',
        'is_featured' => 'boolean',
        'stock'       => 'integer',
    ];

    public function getThumbnailAttribute(): string
    {
        return $this->images[0] ?? '/IMAGE/SUPER.jpeg';
    }

    public function getStockLabelAttribute(): string
    {
        if (($this->stock ?? 0) <= 0) return 'Stok Habis';
        if ($this->stock <= 5) return 'Stok Terbatas';
        return 'Stok Tersedia';
    }

    public function getStockColorAttribute(): string
    {
        if (($this->stock ?? 0) <= 0) return '#dc2626';
        if ($this->stock <= 5) return '#d97706';
        return '#16a34a';
    }
}
