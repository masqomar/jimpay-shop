<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantTransaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['credit', 'debit', 'type', 'transaction_type', 'date', 'user_id', 'merchant_id', 'method', 'note'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = ['credit' => 'integer', 'debit' => 'integer', 'type' => 'string', 'date' => 'date:d/m/Y', 'method' => 'string', 'note' => 'string', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

    public function merchant()
    {
        return $this->belongsTo(\App\Models\User::class, 'merchant_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
