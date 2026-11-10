<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class District extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'ProId'];
    public function index(){
        $dis = DB::table('districts')->get();
        return $dis;
    }
}
