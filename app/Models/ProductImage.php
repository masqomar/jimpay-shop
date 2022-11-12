<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['product_id', 'image'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = ['image' => 'string', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

public function product()
	{
		return $this->belongsTo(\App\Models\Product::class);
	}


}
