<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required',
			'price' => 'required|numeric',
			'quantity' => 'required|numeric',
			'description' => 'required',
			'product_image' => 'required|image|max:1024',
			'category_id' => 'required|exists:App\Models\Category,id',
			'user_id' => 'required|exists:App\Models\User,id',
			'status' => 'required',
        ];
    }
}
