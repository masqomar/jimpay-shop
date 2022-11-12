<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserTransactionRequest extends FormRequest
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
			'type' => 'required|in:masuk,keluar',
			'transaction_type' => 'required',
			'date' => 'required|date',
			'user_id' => 'required|exists:App\Models\User,id',
			'methode' => 'required',
			'note' => 'required',
        ];
    }
}
