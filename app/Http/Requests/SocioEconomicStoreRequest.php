<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocioEconomicStoreRequest extends FormRequest
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

            'name'=>'required|max:100',
            'ward'=>'required|max:100',
            'district'=>'required',
            'municipality'=>'required',
            'user_id'=>'required',
            'start_date'=>'nullable',
        ];
    }
}
