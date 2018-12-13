<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractorStoreRequest extends FormRequest
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
            'contractor_name'=>'required|max:100',
            'contact_person'=>'required|max:100',
            'sme_manager_name'=>'required',
            'landline'=>'required',
            'mobile'=>'required',
            'project_id'=>'required',
        ];
    }
}
