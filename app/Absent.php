<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Student;


class Absent extends Model
{

	public $fillable = ['user_id', 'student_id', 'status', 'keterangan'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function student()
    {
    	return $this->belongsTo(Student::class);
    }
}
