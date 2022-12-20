<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationFormRequest extends FormRequest
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
        $rules = [
            'name' => 'required|unique:locations|max:255',
            'country' => 'required',
            'description' => 'required|max:2000',
            'image1' => ['file', 'mimes:jpg,png,jpeg', 'max:5048'],
            'image2' => ['file', 'mimes:jpg,png,jpeg', 'max:5048'],
            'image3' => ['file', 'mimes:jpg,png,jpeg', 'max:5048'],
            'image4' => ['file', 'mimes:jpg,png,jpeg', 'max:5048']
        ];

        if (in_array($this->method(), ['POST'])) {
            $rules['image1'] = ['file', 'required', 'mimes:jpg,png,jpeg', 'max:5048'];
            $rules['image2'] = ['file', 'required', 'mimes:jpg,png,jpeg', 'max:5048'];
            $rules['image3'] = ['file', 'required', 'mimes:jpg,png,jpeg', 'max:5048'];
            $rules['image4'] = ['file', 'required', 'mimes:jpg,png,jpeg', 'max:5048'];
        }

        return $rules;
    }
}
