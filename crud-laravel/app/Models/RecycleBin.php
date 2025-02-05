<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecycleBin extends Model
{
    protected $table = 'recycle_bin';

    protected $fillable = [
        'product_id',
        'name',
        'qty',
        'price',
        'description',
        'deleted_at'
    ];

    protected $dates = ['deleted_at'];

    // Relationship to Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
