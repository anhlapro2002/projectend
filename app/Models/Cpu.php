<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cpu extends Model
{
    use HasFactory;
    protected $table = 'cpu';
    public function index(){
        $cpus = DB::table('cpu')->get();
        return $cpus;
    }
}
