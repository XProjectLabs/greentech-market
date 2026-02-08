<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class product extends Model
{
    //
    protected $fillable = [
        'name', 'description', 'price', 'stock', 'category_id', 'image_url'
    ];

    public function Category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
