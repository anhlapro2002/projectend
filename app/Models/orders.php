<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'Status', 'Date', 'UserName', 'UserEmail', 'UserPhone', 'TotalAmount', 'TrackingNumber', 'TransactionReference', 'UserId', 'PayId', 'ShipId', 'WardId',	'DisId', 'ProId'
    ];

    public function index()
    {
        $order = DB::table('orders')
        ->join('user', 'orders.UserId', '=', 'user.id')
        ->join('paymentmethods', 'orders.PayId', '=', 'paymentmethods.id')
        ->join('shippingunits', 'orders.ShipId', '=', 'shippingunits.id')
        ->join('wards', 'orders.WardId', '=', 'wards.id')
        ->join('districts', 'orders.DisId', '=', 'districts.id')
        ->join('provinces', 'orders.ProId', '=', 'provinces.id')
        ->join('orderdetails', 'orders.id', '=', 'orderdetails.OrderID')
        ->Join('productsdetails', 'orderdetails.PrddID', '=', 'productsdetails.id')
        ->join('products', 'products.id', '=', 'productsdetails.PrdId')
        ->select(
            'orders.*',
            'user.name as cusname',
            'paymentmethods.name as payname',
            'shippingunits.name as shipname',
            'wards.name as wardname',
            'districts.name as disname',
            'provinces.name as proname',
            'products.name as prdname',
            'productsdetails.price as proprice'
        )
        ->orderBy('orders.status', 'asc');
        return $order; 
    }

    
    public function edit($id)
    {
        $order = DB::table('orders')
        ->join('user', 'orders.UserId', '=', 'user.id')
        ->join('paymentmethods', 'orders.PayId', '=', 'paymentmethods.id')
        ->join('shippingunits', 'orders.ShipId', '=', 'shippingunits.id')
        ->join('wards', 'orders.WardId', '=', 'wards.id')
        ->join('districts', 'orders.DisId', '=', 'districts.id')
        ->join('provinces', 'orders.ProId', '=', 'provinces.id')
        ->join('orderdetails', 'orders.id', '=', 'orderdetails.OrderID')
        ->Join('productsdetails', 'orderdetails.PrddID', '=', 'productsdetails.id')
        ->join('products', 'products.id', '=', 'productsdetails.PrdId')
        ->select(
            'orders.*',
            'user.name as cusname',
            'paymentmethods.name as payname',
            'shippingunits.name as shipname',
            'wards.name as wardname',
            'districts.name as disname',
            'provinces.name as proname',
            'products.name as prdname',
            'productsdetails.price as proprice'
        )
        ->where('orders.id', $id)
        ->get();
        return $order; 
    }
    public function fileall($id){
        $order = DB::table('orders')
        ->join('shippingunits', 'orders.ShipId', '=', 'shippingunits.id')
        ->join('orderdetails', 'orders.id', '=', 'orderdetails.OrderID')
        ->Join('productsdetails', 'orderdetails.PrddID', '=', 'productsdetails.id')
        ->join('products', 'products.id', '=', 'productsdetails.PrdId')
        ->select(
            'orders.*',
            'orderdetails.PrdQuantity as quantity',
            'products.name as prdname',
            'shippingunits.URL as shipURL',
            'products.image as img',
            'productsdetails.price as proprice'
        )
        ->where('orders.id', $id)
        ->get();
        return $order;
    }
    
}
