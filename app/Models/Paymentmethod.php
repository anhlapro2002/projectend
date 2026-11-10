<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Paymentmethod extends Model
{
    use HasFactory;
    public function index(){
        $paymentMethods = DB::table('paymentmethods')->get();
        return $paymentMethods;
    }
}
