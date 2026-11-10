<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = ['name'];

    public function index(){
        $category = DB::table('category')->get();
        return $category;
    }
    public function store(){
        $category = DB::table('category')->insert([
            'name' => $this -> name
        ]);
    }

}
