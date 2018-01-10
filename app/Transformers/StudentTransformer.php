<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Student;

class StudentTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Student $student)
    {
        return [
            'id'         => $student->id,
            'nama_siswa' => $student->nama_siswa,
            'kelas'      => $student->kelas,
            'created_at' => $student->created_at->diffForHumans(),
            
        ];
    }
}
