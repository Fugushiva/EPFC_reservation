<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLocationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $phoneRegex = '^\+[0-9]{2}|^\+[0-9]{2}\(0\)|^\(\+[0-9]{2}\)\(0\)|^00[0-9]{2}|^0([0-9]{9}$|[0-9\-\s]{10}$)';
        return [
            'designation' => ['required', 'string', 'max:60'],
            'locality_id' => ['required', 'exists:localities,id'],
            'address' => ['required', 'string', 'max:255'],
            'website' => ['nullable','url:http,https', 'max:255'],
            'phone' => ['required', "regex:/$phoneRegex/", 'max:30'],
            'picture_url' => ['required','url:http,https', 'max:1000'],
            'slug' => ['required']
        ];
    }

    public function prepareForValidation()
    {


        $this->merge([
           'slug' => toSlug($this->input('designation'))
        ]);

    }
}
