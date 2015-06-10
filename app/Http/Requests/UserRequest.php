<?php namespace FerEmma\Http\Requests;

use FerEmma\Http\Requests\Request;

class UserRequest extends Request {

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
			'name'=>'required|min:2|max:150',
			'surname'=>'required|min:2|max:150',
			'username'=>'required|min:2|max:100',
			'password'=>'required',
			'email'=>'required|email|max:100',
			'dni'=>'required',
			'address'=>'required',
			'phone'=>'required',
			'cuil'=>'required',
			'birthday'=>'required|date',
			'sex'=>'required',
		];
	}

}
