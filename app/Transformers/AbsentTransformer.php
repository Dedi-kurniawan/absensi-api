<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Absent;

class AbsentTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Absent $absent)
    {
        return [
            'id'         => $absent->id,
            'student'    => $absent->student_id,
            'status'     => $absent->status,
            'keterangan' => $absent->keterangan,
        ];
    }
}
