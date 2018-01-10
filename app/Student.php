<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Student extends Model
{
	public $fillable = ['user_id', 'nama_siswa', 'kelas']; 

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
