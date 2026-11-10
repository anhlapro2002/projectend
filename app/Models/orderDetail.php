<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class orderDetail extends Model
{
    use HasFactory;
    protected $table = 'orderdetails';
    protected $fillable = [
        'PrdPrice', 'PrdQuantity', 'PrddID', 'OrderID'
    ];
    

    public function index(){
        $orderdetails = DB::table('orderdetails')->get();
        return $orderdetails;
    }

    public function productDetail()
    {
        return $this->belongsTo(ProductDetail::class, 'PrddID');
    }
}
