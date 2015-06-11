<?php namespace FerEmma\Http\Requests;

use FerEmma\Http\Requests\Request;

class PostRequest extends Request {

    /**
     * Determine if the post is authorized to make this request.
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
            'name'=>'required|min:2|max:100',
            'description'=>'',
        ];
    }

}
