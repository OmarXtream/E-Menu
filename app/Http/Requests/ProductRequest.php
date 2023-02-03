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
     * @return array<string, mixed>
     */
    

    public function rules()
    {

        foreach (config('app.languages') as $key => $value) {
            $data[$key . '.title'] = 'nullable|string|required';
            $data[$key . '.content'] = 'nullable|string|required';
        }
        return $data;
    }
}
