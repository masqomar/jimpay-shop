<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserTransactionItemRequest extends FormRequest
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
            'user_transaction_id' => 'required|exists:App\Models\UserTransaction,id',
			'user_id' => 'required|exists:App\Models\User,id',
			'address' => 'required',
			'buyer_note' => 'required',
			'total_price' => 'required|numeric',
			'shipping_fee' => 'required|numeric',
			'transaction_fee' => 'required|numeric',
			'product_id' => 'required|exists:App\Models\Product,id',
			'quantity' => 'required|numeric',
			'merchant_id' => 'required|exists:App\Models\User,id',
        ];
    }
}
