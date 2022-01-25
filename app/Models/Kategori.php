<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'kategori';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'nama_kategori',
    ];
}
