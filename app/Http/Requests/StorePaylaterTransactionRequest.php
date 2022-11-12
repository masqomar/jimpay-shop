<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaylaterTransactionRequest extends FormRequest
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
            'paylater_id' => 'required|exists:App\Models\Paylater,id',
			'user_id' => 'required|exists:App\Models\User,id',
			'amount' => 'required|numeric',
			'note' => 'required',
			'date' => 'required|date',
        ];
    }
}
