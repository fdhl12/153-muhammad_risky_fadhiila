<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Jika Anda memiliki kolom yang ingin diisi secara massal, tambahkan ke fillable array
    protected $fillable = ['name'];
}
