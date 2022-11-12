<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMerchantTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'credit' => 'required|numeric',
			'debit' => 'required|numeric',
			'type' => 'required',
			'transaction_type' => 'required|in:masuk,keluar',
			'date' => 'required|date',
			'user_id' => 'required|exists:App\Models\User,id',
			'merchant_id' => 'required|exists:App\Models\User,id',
			'method' => 'required',
			'note' => 'required',
        ];
    }
}
