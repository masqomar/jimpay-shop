<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTransactionItem extends Model
{
	use HasFactory;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var string[]
	 */
	protected $fillable = ['user_transaction_id', 'user_id', 'address', 'buyer_note', 'total_price', 'shipping_fee', 'transaction_fee', 'product_id', 'quantity', 'merchant_id'];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array
	 */
	protected $casts = ['buyer_note' => 'string', 'total_price' => 'integer', 'shipping_fee' => 'integer', 'transaction_fee' => 'integer', 'quantity' => 'integer', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

	public function user_transaction()
	{
		return $this->belongsTo(\App\Models\UserTransaction::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function product()
	{
		return $this->belongsTo(\App\Models\Product::class);
	}

	public function merchant()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
