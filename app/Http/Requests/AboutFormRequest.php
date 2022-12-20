<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutFormRequest extends FormRequest
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
            'title' => 'required|max:255',
            'description' => 'required|max:2000',
            'subtitle' => 'required|max:255',
            'text' => 'required|max:2000',
            'image_path1' => ['file', 'mimes:jpg,png,jpeg', 'max:5048'],
            'image_path2' => ['file', 'mimes:jpg,png,jpeg', 'max:5048'],
            'image_path3' => ['file', 'mimes:jpg,png,jpeg', 'max:5048'],
            'image_path4' => ['file', 'mimes:jpg,png,jpeg', 'max:5048'],
            'image_path5' => ['file', 'mimes:jpg,png,jpeg', 'max:5048'],
        ];

        if (in_array($this->method(), ['POST'])) {
            $rules['image_path1'] = ['file', 'required', 'mimes:jpg,png,jpeg', 'max:5048'];
            $rules['image_path2'] = ['file', 'required', 'mimes:jpg,png,jpeg', 'max:5048'];
            $rules['image_path3'] = ['file', 'required', 'mimes:jpg,png,jpeg', 'max:5048'];
            $rules['image_path4'] = ['file', 'required', 'mimes:jpg,png,jpeg', 'max:5048'];
            $rules['image_path5'] = ['file', 'required', 'mimes:jpg,png,jpeg', 'max:5048'];
        }

        return $rules;
    }
}
