<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSaving extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['user_id', 'kop_product_id', 'quantity', 'month', 'year', 'deposit_date'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = ['quantity' => 'integer', 'month' => 'date:d/m/Y', 'year' => 'integer', 'deposit_date' => 'date:d/m/Y', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function kop_product()
	{
		return $this->belongsTo(\App\Models\KopProduct::class);
	}


}
