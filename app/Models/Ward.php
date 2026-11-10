<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ward extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'DisId'];
    public function index(){
        $ward = DB::table('wards')->get();
        return $ward;
    }
    public function file($key)
    {
        $results = DB::table('wards')
            ->join('districts', 'wards.DisId', '=', 'districts.id')
            ->join('provinces', 'districts.ProId', '=', 'provinces.id')
            ->select(
                'wards.id',
                DB::raw("CONCAT(wards.name, ', ', districts.name, ', ', provinces.name) as full_address")
            )
            ->where('wards.name', 'LIKE', '%' . $key . '%')
            ->get();
        $addresses = $results->map(function($item) {
            return [
                'id' => $item->id,
                'address' => $item->full_address
            ];
        });
    
        return $addresses;
    }

    public function fbid($id){
        $results = DB::table('wards')
            ->join('districts', 'wards.DisId', '=', 'districts.id')
            ->join('provinces', 'districts.ProId', '=', 'provinces.id')
            ->select(
                'wards.id',
                'provinces.id as prid',
                'districts.id as disid'
            )
            ->where( 'wards.id', '=', $id )
            ->get();
        return $results;
    }
}
