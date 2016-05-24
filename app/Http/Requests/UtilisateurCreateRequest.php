<?php namespace freeads\Http\Requests;

use freeads\Http\Requests\Request;

class UtilisateurCreateRequest extends Request {

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
			'username' => 'required|min:2|unique:users',
            'email'    => 'required|unique:users',
            'password' => 'min:2|required'
		];
	}

}
