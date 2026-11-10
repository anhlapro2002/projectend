<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ShippingUnit extends Model
{
    use HasFactory;
    public function index(){
        $shippingUnits = DB::table('shippingunits')->get();
        return $shippingUnits;
    }
}
