<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserTopupRequest extends FormRequest
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
            'topup_amount' => 'required|numeric',
			'user_id' => 'required|exists:App\Models\User,id',
			'date' => 'required|date',
			'note' => 'required',
        ];
    }
}
