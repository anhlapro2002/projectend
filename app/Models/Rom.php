<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rom extends Model
{
    use HasFactory;
    protected $table = 'rom';
    public function index(){
        $rom = DB::table('rom')->get();
        return $rom;
    }
}
