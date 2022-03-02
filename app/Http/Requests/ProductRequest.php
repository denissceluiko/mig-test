<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $methods = [
            'GET' => 'indexRules',
            'POST' => 'storeRules',
        ];

        return $this->{$methods[$this->getMethod()]}();
    }

    public function indexRules()
    {
        return [
            'ean13' => 'nullable|in:asc,desc',
            'name' => 'nullable|in:asc,desc',
            'stock' => 'nullable|in:asc,desc',
            'cost' => 'nullable|in:asc,desc',
            'price' => 'nullable|in:asc,desc',
        ];
    }

    public function storeRules()
    {
        return [
            'ean13' => 'required|digits:13|unique:products',
            'name' => 'required|string',
            'stock' => 'required|integer',
            'cost' => 'required|numeric',
            'price' => 'required|numeric',
        ];
    }
}
