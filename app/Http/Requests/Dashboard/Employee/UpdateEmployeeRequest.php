<?php

namespace App\Http\Requests\Dashboard\Employee;

use App\Enums\UserType;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
        return [
            'fname'         => 'required|min:2|max:191',
            'lname'         => 'required|min:2|max:191',
            'email'         => 'nullable|email|unique:users,email,'.$this->id,
            'phone'         => 'nullable|min:8|max:15|unique:users,phone,'.$this->id,
            'password'      => 'nullable|min:6|max:32|confirmed',
            'image'         => 'nullable|mimes:png,jpg,jpeg,gif,webp,tiff,bmb',
            'salary'        => 'required|numeric',
            'department_id' => 'required|exists:department,id',
            'type'          => 'nullable|in:'.UserType::$EMPLOYEE.','.UserType::$MANAGER
        ];
    }
}
