<?php

namespace App\Http\Requests\Dashboard\Task;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
            'title'         => 'required|min:2|max:191',
            'description'   => 'nullable|min:2',
            'employee_id'   => 'required|exists:users,id,type,'.User::$EMPLOYEE.',manager_id,1',
            'start_at'      => 'required|date',
            'end_at'        => 'required|date|after_or_equal:start_at',
            'status'        => 'nullable|in:'.Task::$PENDING.','.Task::$STARTED.','.Task::$COMPLETED
        ];
    }
}
