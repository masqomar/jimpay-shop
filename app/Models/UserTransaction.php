<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTransaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['credit', 'debit', 'type', 'transaction_type', 'date', 'user_id', 'methode', 'note'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = ['credit' => 'integer', 'debit' => 'integer', 'transaction_type' => 'string', 'date' => 'date:d/m/Y', 'methode' => 'string', 'note' => 'string', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}


}
