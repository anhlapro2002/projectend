<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductsDetail extends Model
{
    use HasFactory;
    protected $table = 'productsdetails';

    protected $fillable = [
        'price', 'quantity', 'PrdId', 'RamId', 'RomId', 'CpuId', 'GpuId'
    ];

    // Define the relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'PrdId', 'id');
    }
    public function index(){
        $productsdetails = DB::table('productsdetails')->get();
        return $productsdetails;
    }
}
