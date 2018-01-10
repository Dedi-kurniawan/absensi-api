<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absent extends Model
{

	public $fillable = ['user_id', 'student_id', 'status', 'keterangan'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
