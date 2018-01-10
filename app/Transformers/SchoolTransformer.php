<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\School;

class SchoolTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(School $school)
    {
        return [
            'id'           => $school->id,
            'nama_sekolah' => $school->nama_sekolah,
            'user_id'      => $school->user_id,
            'alamat'       => $school->alamat,
            'kecamatan'    => $school->kecamatan,
            'kabupaten'    => $school->kabupaten,
            'provinsi'     => $school->provinsi,
            'created_at'   => $school->created_at->diffForHumans(),
        ];
    }
}
