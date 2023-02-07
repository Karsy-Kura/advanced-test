<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Consts\ParamConst;
use App\Rules\Hankaku;

class ContactRequest extends FormRequest
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
      //
      ParamConst::PARAM_FAMILYNAME => 'required|string|max:255',
      ParamConst::PARAM_FIRSTNAME => 'required|string|max:255',
      ParamConst::PARAM_GENDER => 'required|integer|min:1|max:2|',
      ParamConst::PARAM_EMAIL => 'required|email|max:255',
      ParamConst::PARAM_POSTCODE => ['required','string', new Hankaku, 'max:8'],
      ParamConst::PARAM_ADDRESS => 'required|string|max:255',
      ParamConst::PARAM_BUILDINGNAME => 'required|string|max:255',
      ParamConst::PARAM_OPINION => 'required|string|max:120',
    ];
  }
}
