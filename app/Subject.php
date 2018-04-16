<?php

namespace App;

use App\Course;
use App\Staff;
use App\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    //
    use SoftDeletes;

	protected $table 	= 'subjects';
	protected $date 	= ['deleted_at'];

	protected $fillable = [
		'name',
		'description',
		'credits',
	];

	public function courses()
	{
		return $this->belongsToMany(Course::class);
	}

	public function students()
	{
		return $this->belongsToMany(Student::class);
	}

	public function staffs()
	{
		return $this->belongsToMany(Staff::class);
	}

}
