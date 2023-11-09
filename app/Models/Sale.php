<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use LaravelEasyRepository\Traits\GenUid;

class Sale extends Model
{
    use HasFactory, GenUid;

    protected $fillable = ['total_price','payment_method'];

    public function products() : BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_sale', 'sale_id', 'product_id')
            ->withPivot(['price', 'variants']);
    }
}
