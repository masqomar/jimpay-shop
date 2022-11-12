<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationDisbursement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['donation_id', 'user_id', 'date', 'amount', 'recipient', 'image'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = ['date' => 'date:d/m/Y', 'amount' => 'integer', 'recipient' => 'string', 'image' => 'string', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

public function donation()
	{
		return $this->belongsTo(\App\Models\Donation::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}


}
