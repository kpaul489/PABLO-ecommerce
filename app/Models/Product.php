<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'stock',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'stock' => 'integer',
    ];

    // Returns the full image URL using the public/images path
    // Falls back to a default placeholder if no image is set
    public function getImageUrlAttribute(): string
    {
        if ($this->image) {
            return asset('images/'.$this->image);
        }

        return asset('images/placeholder.png');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
