<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        // digits_between:2
        return [
            'name' => 'string|min:2|unique:employees,name',
            'salary' => 'integer|min:2000000|max:10000000', 
             
            
        ];
    }
}
