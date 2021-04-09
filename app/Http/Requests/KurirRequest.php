<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KurirRequest extends FormRequest
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
                        'nama_kurir' => 'required',
                        'kendaraan' => 'required',
                        'no_hp' => 'required|unique:data_kurir',
                        'merk_kendaraan' => 'required',
                        'nama_agen' => 'required',
                        'no_plat' => 'required|unique:data_kurir',
                        'username' => 'required|unique:users',
                        'password' => 'required',
                        'alamat' => 'required',
                    ];
                }

            default:
                break;
        }

        return $rules;
    }
}
