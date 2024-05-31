<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function contents()
    {
        return $this->hasMany(Content::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    // Jika Anda memiliki kolom yang ingin diisi secara massal, tambahkan ke fillable array
    protected $fillable = ['name'];
}
