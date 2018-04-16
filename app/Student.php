<?php

namespace App;

use App\Subject;
use App\User;
use Illuminate\Database\Eloquent\Model;


class Student extends User
{
    //
    public function subjects()
    {
    	return $this->hasMany(Subject::class);
    }
}
