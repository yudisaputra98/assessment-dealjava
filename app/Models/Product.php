<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','price'];

    public function product_variants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id');
    }

    public function sales() : BelongsToMany
    {
        return $this->belongsToMany(Sale::class, 'product_sale', 'product_id', 'sale_id')
            ->withPivot(['price', 'variants']);
    }
}
