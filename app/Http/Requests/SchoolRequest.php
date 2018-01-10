<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchoolRequest extends FormRequest
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
            'nama_sekolah' => 'required',
            'alamat'       => 'required',
            'kecamatan'    => 'required',
            'kabupaten'    => 'required',
            'provinsi'     => 'required'
        ];
    }

    // public function massages()
    // {
    //     return response()->json([
    //     'nama_sekolah.required' => 'Nama Sekolah Dilarang Kosong',
    //     'alamat.required'       => 'Alamat Dilarang Kosong',
    //     'kecamatan.required'    => 'Kecamatan Dilarang Kosong',
    //     'kabupaten.required'    => 'Kabupaten Dilarang Kosong',
    //     'provinsi.required'     => 'Provinsi Dilarang Kosong',
    //     ]);                
    // }
}
