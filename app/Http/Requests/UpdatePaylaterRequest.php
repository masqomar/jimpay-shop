<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePaylaterRequest extends FormRequest
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
            'code' => 'required',
			'user_id' => 'required|exists:App\Models\User,id',
			'paylater_provider_id' => 'required|exists:App\Models\PaylaterProvider,id',
			'bank_id' => 'required|exists:App\Models\Bank,id',
			'bank_account_number' => 'required|numeric',
			'bank_account_name' => 'required',
			'start_date' => 'required|date',
			'status' => 'required',
			'amount' => 'required|numeric',
			'duration' => 'required|numeric',
			'finish_date' => 'required|date',
			'note' => 'required',
			'image' => 'nullable|image|max:1024',
        ];
    }
}
