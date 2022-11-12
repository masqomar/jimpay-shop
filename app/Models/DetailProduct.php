<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProduct extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['product_id', 'variant', 'discount'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = ['variant' => 'string', 'discount' => 'integer', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

public function product()
	{
		return $this->belongsTo(\App\Models\Product::class);
	}


}
