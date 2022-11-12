<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paylater extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['code', 'user_id', 'paylater_provider_id', 'bank_id', 'bank_account_number', 'bank_account_name', 'start_date', 'status', 'amount', 'duration', 'finish_date', 'note', 'image'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = ['code' => 'string', 'bank_account_number' => 'integer', 'bank_account_name' => 'string', 'start_date' => 'date:d/m/Y', 'status' => 'string', 'amount' => 'integer', 'duration' => 'integer', 'finish_date' => 'date:d/m/Y', 'note' => 'string', 'image' => 'string', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function paylater_provider()
	{
		return $this->belongsTo(\App\Models\PaylaterProvider::class);
	}

	public function bank()
	{
		return $this->belongsTo(\App\Models\Bank::class);
	}


}
