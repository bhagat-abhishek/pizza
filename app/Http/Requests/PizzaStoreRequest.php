<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PizzaStoreRequest extends FormRequest
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
            // Validate the Pizza Create
            'name' => 'required|string|min:3|max:30',
            'description' => 'required|min:3|max:300',
            'small_price' => 'required|number',
            'medium_price' => 'required|number',
            'large_price' => 'required|number',
            'category' => 'required',
            'image' => "required|mimes:png,jpeg,jpg",

        ];
    }
}
