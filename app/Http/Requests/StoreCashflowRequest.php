<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCashflowRequest extends FormRequest
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
            'debit' => 'required|numeric',
			'credit' => 'required|numeric',
			'type' => 'required|in:masuk,keluar',
			'saving_account_id' => 'required|exists:App\Models\SavingAccount,id',
			'description' => 'nullable',
			'date' => 'required|date',
        ];
    }
}
