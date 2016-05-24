<?php namespace freeads\Http\Requests;

use freeads\Http\Requests\Request;

class AnnoncesCreateRequest extends Request {

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
			'titre' => 'min:2|required',
            'description'    => 'required',
            'prix' => 'required',
            'image[]' => 'mimes',
		];
	}

}
