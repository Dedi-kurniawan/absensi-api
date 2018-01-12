<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\School;
use App\Student;
use App\Absent;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'api_token', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    

    public function schools()
    {
        return $this->hasMany(School::class);//harusnya sih hasOne tapi belum ketemu kodingnnya
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function absents()
    {
        return $this->hasMany(Absent::class);
    }

    public function ownsSchool(School $school)
    {
        return auth()->id() === $school->user->id;
    }

    public function ownsStudent(Student $student)
    {
        return auth()->id() === $student->user->id;
    }

    public function ownsAbsent(Absent $absent)
    {
        return auth()->id() === $absent->user->id;
    }
}
