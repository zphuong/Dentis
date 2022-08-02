<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsuranceRequest extends FormRequest
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
            'code'          => 'required|min:6|unique:insurance,code,'.$this->id,
            'name'          => 'required',
            'phone'         => 'required',
            'email'         => 'required|email',
            'address'        => 'required',
            'end_date'      => 'required',
            'description'   => 'required'
        ];
    }

    public function messages(){
        return [
            'code.required' =>  'Bắt buộc',
            'code.min'      =>  'Lớn hơn 6 kí tự',
            'code.unique'   =>  'Mã bị trùng',
            'email'         =>  'Không đúng định dạng email',
            'required'      =>  'Nhập thông tin khách hàng',
        ];
    }
}
