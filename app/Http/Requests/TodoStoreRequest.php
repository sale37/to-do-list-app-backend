<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class TodoStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'description' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'Description is required!'
        ];
    }

}