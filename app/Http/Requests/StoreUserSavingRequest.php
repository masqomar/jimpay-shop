<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserSavingRequest extends FormRequest
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
            'user_id' => 'required|exists:App\Models\User,id',
			'kop_product_id' => 'required|exists:App\Models\KopProduct,id',
			'quantity' => 'required|numeric',
			'month' => 'required|date',
			'year' => 'required',
			'deposit_date' => 'required|date',
        ];
    }
}
