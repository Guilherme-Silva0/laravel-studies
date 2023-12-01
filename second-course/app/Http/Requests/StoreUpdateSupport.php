<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateSupport extends FormRequest
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
        if($this->method() === 'PUT') $id = $this->support ?? $this->id;

        $rules = $this->method() === 'PUT' ? [
            'subject' => "required|min:3|max:255|unique:supports,subject,{$id},id",
            'body' => ['required', 'min:3', 'max:100000'],
        ] : [
            'subject' => 'required|min:3|max:255|unique:supports,subject',
            'body' => ['required', 'min:3', 'max:100000'],
         ];

        return $rules;
    }
}
