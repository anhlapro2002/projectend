<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GPU extends Model
{
    use HasFactory;
    protected $table = 'gpu';
    public function index(){
        $gpu = DB::table('gpu')->get();
        return $gpu;
    }
}
