<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KustomerRequest extends FormRequest
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
        $rules = [];

        switch ($this->method()) {
            case 'POST': {
                    $rules = [
                        'kode' => 'required|unique:data_kustomer',
                        'wilayah' => 'required',
                        'nama_kustomer' => 'required',
                        'telepon' => 'required|numeric',
                        'telepon_seluler' => 'required|numeric',
                        'email' => 'required|unique:users',
                        'username' => 'required|unique:users',
                        'alamat' => 'required',
                        'password' => 'required',
                    ];
                }

            default:
                break;
        }

        return $rules;
    }
}
