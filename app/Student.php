<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Absent;

class Student extends Model
{
	public $fillable = ['user_id', 'nama_siswa', 'kelas']; 

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function absents()
    {
    	return $this->hasMany(Absent::class);
    }
}
