<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavingTransaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['user_id', 'kop_product_id', 'amount', 'date', 'description', 'status', 'image'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = ['amount' => 'integer', 'date' => 'date:d/m/Y', 'description' => 'string', 'status' => 'string', 'image' => 'string', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function kop_product()
	{
		return $this->belongsTo(\App\Models\KopProduct::class);
	}


}
