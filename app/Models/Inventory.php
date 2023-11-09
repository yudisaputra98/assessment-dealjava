<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LaravelEasyRepository\Traits\GenUid;

class Inventory extends Model
{
    use HasFactory, GenUid;

    protected $fillable = ['name','price','amount','unit'];
}
