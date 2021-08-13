<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => [ 'required', 'string', 'max:100', "unique:tasks,title" . ( $this->task ? ",{$this->task->id}" : NULL ) ],
            'detail' => [ 'string' ],
            'day' => [ 'required', 'integer', 'min:0,max:6' ],
            'time' => [ 'required', 'date_format:H:i' ],
        ];
    }
}
