<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class School extends Model
{
	protected $fillable = [
		'nama_sekolah', 'user_id', 'alamat', 'kecamatan', 'kabupaten', 'provinsi',
    ];


    public function scopeLatesFirst($query)
    {
    	return $query->orderBy('id', 'DESC');	
    }


    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
