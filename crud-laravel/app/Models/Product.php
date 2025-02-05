<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'qty',
        'price',
        'description'
    ];

    // Relationship to RecycleBin
    public function recycled()
    {
        return $this->hasOne(RecycleBin::class);
    }
}
