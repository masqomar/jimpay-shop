<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTopup extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['topup_amount', 'user_id', 'date', 'note'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = ['topup_amount' => 'integer', 'date' => 'date:d/m/Y', 'note' => 'string', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}


}
