<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manufacturer extends Model
{
    use HasFactory;

    protected $table = 'manufacturers';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function product(){
        return $this ->HasMany(Product::class, 'manufacturer_id', 'id');
    }
}
