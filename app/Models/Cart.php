<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['product_id', 'merchant_id', 'user_id', 'quantity'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = ['quantity' => 'integer', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class);
    }

    public function merchant()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
