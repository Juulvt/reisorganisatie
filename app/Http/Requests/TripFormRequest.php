<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TripFormRequest extends FormRequest
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
            'name' => 'required|unique:trips|max:255',
            'location' => 'required|integer',
            'type' => 'required|integer',
            'description' => 'required|max:2000',
            'accomodationname' => 'required|max:255',
            'accomodationdescription' => 'required|max:2000',
            'address' => 'required|max:2000',
            'city' => 'required|max:2000',
            'minvisitors' => 'required|integer',
            'maxvisitors' => 'required|integer',
            'price' => 'required|numeric',
            'image1' => ['file', 'mimes:jpg,png,jpeg', 'max:5048'],
            'image2' => ['file', 'mimes:jpg,png,jpeg', 'max:5048']
        ];

        if (in_array($this->method(), ['POST'])) {
            $rules['image1'] = ['file', 'required', 'mimes:jpg,png,jpeg', 'max:5048'];
            $rules['image2'] = ['file', 'required', 'mimes:jpg,png,jpeg', 'max:5048'];
        }

        return $rules;
    }
}
