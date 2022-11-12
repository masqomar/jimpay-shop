<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDonationTransactionRequest extends FormRequest
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
            'date' => 'required|date',
			'donation_id' => 'required|exists:App\Models\Donation,id',
			'user_id' => 'required|exists:App\Models\User,id',
			'amount' => 'required|numeric',
			'private' => 'required',
        ];
    }
}
