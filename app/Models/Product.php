<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['name', 'price', 'quantity', 'description', 'product_image', 'category_id', 'user_id', 'status'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = ['name' => 'string', 'price' => 'integer', 'quantity' => 'integer', 'description' => 'string', 'product_image' => 'string', 'status' => 'boolean', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function product_images()
    {
        return $this->hasMany(\App\Models\ProductImage::class);
    }

    public function detail()
    {
        return $this->hasMany(\App\Models\DetailProduct::class);
    }
}
