<?php

namespace App;

use App\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    //
    use SoftDeletes;

    protected $table = 'courses';

    protected $dates = ['deleted_at'];

    protected $fillable = [
    	'name',
    	'description',
    ];

    public function subjects()
    {
    	return $this->hasMany(Subject::class);
    }
}
