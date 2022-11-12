<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationTransaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['date', 'donation_id', 'user_id', 'amount', 'private'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = ['date' => 'date:d/m/Y', 'amount' => 'integer', 'private' => 'boolean', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

	public function donation()
	{
		return $this->belongsTo(\App\Models\Donation::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}


}
