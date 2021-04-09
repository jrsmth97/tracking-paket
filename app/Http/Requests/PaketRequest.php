<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaketRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [];

        switch ($this->method()) {
            case 'POST': {
                    $rules = [
                        'no_stt' => 'required|unique:data_paket',
                        'kustomer' => 'required',
                        'agen_perwakilan' => 'required',
                        'pelayanan' => 'required',
                        'tujuan' => 'required',
                        'tipe_paket' => 'required',
                        'tujuan' => 'required',
                        'wilayah' => 'required',
                        'alamat_pengirim' => 'required',
                        'alamat_penerima' => 'required',
                        'koli' => 'required|numeric',
                        'berat' => 'required|numeric',
                        'keterangan' => 'required',
                        'pembayaran' => 'required',
                        'tanggal_input' => 'required',
                        'tanggal_pickup' => 'required',
                        'total_harga' => 'required|numeric',
                    ];
                }

            default:
                break;
        }

        return $rules;
    }
}
