<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class customer extends Model
{
    use HasFactory;
    protected $table = 'user';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'WardId', 'role', 'password'
    ];

    public function index()
    {
        $customer = DB::table('user')
        ->join('wards', 'user.WardId', '=', 'wards.id')
        ->join('districts', 'wards.DisId', '=', 'districts.id')
        ->join('provinces', 'districts.ProId', '=', 'provinces.id')
        ->select(
            'user.*',
            'wards.DisId',
            'districts.ProId',
            'wards.name as wardname',
            'districts.name as disname',
            'provinces.name as proname'
        )
        ->where('user.role', '=', 2);
        return $customer; 
    }
    public function store($data)
    {
        DB::transaction(function () use ($data) {
            DB::table('user')->insert([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'WardId' => $data['WardId'],
                'role' => 2,
                'password' => Hash::make($data['password']),
            ]);
        });
    }
    public function edit($id)
    {
        $customer = DB::table('user')
        ->join('wards', 'user.WardId', '=', 'wards.id')
        ->join('districts', 'wards.DisId', '=', 'districts.id')
        ->join('provinces', 'districts.ProId', '=', 'provinces.id')
        ->select(
            'user.*',
            'wards.DisId',
            'districts.ProId',
            'wards.name as wardname',
            'districts.name as disname',
            'provinces.name as proname'
        )
        ->where('user.id', $id)
        ->get();
        return $customer; 
    }
    public function signupcus($data) {
        DB::transaction(function () use ($data) {
            DB::table('user')->insert([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'WardId' => $data['WardId'],
                'role' => 2,
                'password' => Hash::make($data['password']),
            ]);
        });
    }
   
}
