<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name', 'description', 'image', 'status', 'isDeleted', 'CatId'
    ];
    
    public function index()
    {
        $products = DB::table('products')
            ->join('category', 'products.CatId', '=', 'category.id')
            ->join('productsdetails', 'products.id', '=', 'productsdetails.PrdId')
            ->Join('ram', 'productsdetails.RamId', '=', 'ram.id')
            ->Join('rom', 'productsdetails.RomId', '=', 'rom.id')
            ->Join('cpu', 'productsdetails.CpuId', '=', 'cpu.id')
            ->Join('gpu', 'productsdetails.GpuId', '=', 'gpu.id')
            ->select(
                'products.*',
                'productsdetails.price',
                'productsdetails.quantity',
                'category.name as catname',
                'ram.name as ramname',
                'rom.name as romname',
                'cpu.name as cpuname',
                'gpu.name as gpuname'
            )
            ->orderBy('products.id', 'asc');
        return $products;
    }
    public function store($data)
    {
        DB::transaction(function() use ($data) {
            // Thêm sản phẩm vào bảng products
            $productId = DB::table('products')->insertGetId([
                'name' => $data['name'],
                'description' => $data['description'],
                'image' => $data['image'],
                'status' => $data['status'],
                'isDeleted'=> 0,
                'CatId' => $data['CatId'],
            ]);
    
            // Thêm chi tiết sản phẩm vào bảng productdetails
            DB::table('productsdetails')->insert([
                'PrdId' => $productId,
                'price' => $data['price'],
                'quantity' => $data['quantity'],
                'RamId' => $data['RamId'],
                'RomId' => $data['RomId'],
                'CpuId' => $data['CpuId'],
                'GpuId' => $data['GpuId'],
            ]);
        });
    }

    public function edit($id)
    {
        $products = DB::table('products')
            ->join('category', 'products.CatId', '=', 'category.id')
            ->join('productsdetails', 'products.id', '=', 'productsdetails.PrdId')
            ->Join('ram', 'productsdetails.RamId', '=', 'ram.id')
            ->Join('rom', 'productsdetails.RomId', '=', 'rom.id')
            ->Join('cpu', 'productsdetails.CpuId', '=', 'cpu.id')
            ->Join('gpu', 'productsdetails.GpuId', '=', 'gpu.id')
            ->select(
                'products.*',
                'products.id',
                'productsdetails.*',
                'category.name as catname',
                'ram.name as ramname',
                'rom.name as romname',
                'cpu.name as cpuname',
                'gpu.name as gpuname'
            )
            ->where('products.id',$id)
            ->get();
        return $products;
    }

    public function updateprd($id)
    {
        DB::transaction(function () use ($id) {  
            DB::table('products')
                ->where('id', $id)
                ->update([
                    'name' => $this->name,
                    'description' => $this->description,
                    'image' => $this->image, 
                    'status' => $this->status,
                    'CatId' => $this->CatId,
                ]);

            DB::table('productsdetails')
                ->where('PrdId', $id)
                ->update([
                    'price' => $this->price,
                    'quantity' => $this->quantity,
                    'RamId' => $this->RamId,
                    'RomId' => $this->RomId,
                    'CpuId' => $this->CpuId,
                    'GpuId' => $this->GpuId,
                ]);
        });
    }

     
}
