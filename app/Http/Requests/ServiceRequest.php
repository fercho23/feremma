<?php namespace FerEmma\Http\Requests;

use FerEmma\Http\Requests\Request;

class ServiceRequest extends Request {

    /**
     * Determine if the service is authorized to make this request.
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
            'price'=>'required|between:0,9999999999.99',
        ];
    }

}
