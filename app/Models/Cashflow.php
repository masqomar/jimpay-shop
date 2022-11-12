<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cashflow extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['debit', 'credit', 'type', 'saving_account_id', 'description', 'date'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = ['debit' => 'integer', 'credit' => 'integer', 'description' => 'string', 'date' => 'date:d/m/Y', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

	public function saving_account()
	{
		return $this->belongsTo(\App\Models\SavingAccount::class);
	}


}
