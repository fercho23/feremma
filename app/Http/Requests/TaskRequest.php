<?php namespace FerEmma\Http\Requests;

use FerEmma\Http\Requests\Request;

class TaskRequest extends Request {

    /**
     * Determine if the task is authorized to make this request.
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
            'name'        => 'required|min:2|max:100',
            'description' => '',
            'priority'    => 'required|integer|min:1|max:10',
            'state'       => 'required|min:1|max:20',

        ];
    }

}
