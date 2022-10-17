<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
 

class OvertimesRequest extends FormRequest
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
        return [
            'employee_id' => 'integer|exists:employees,id',
            'date' => 'date|unique:employees,created_at',
       
            'time_started' => "before:time_ended",
            'time_ended' => "after:time_started"
        ];
    }

    //  
}
