<?php

use App\Course;
use App\Subject;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        User::truncate();
        Course::truncate();
        Subject::truncate();

        $userQuantity 		= 1000;
        $courseQuantity 	= 10;
        $subjectQuantity 	= 200;

        factory(User::class, $userQuantity)->create();
        factory(Course::class, $courseQuantity)->create();
        factory(Subject::class, $subjectQuantity)->create()->each(
        	function($subject){
        		$courses = Course::all()->random(mt_rand(1,5))->pluck('id');
                $subject->courses()->attach($courses);
                
                $staff   = User::all()->random(mt_rand(1,5))->pluck('id');
                $subject->staffs()->attach($staff);
                
                $student = User::all()->random(mt_rand(1,5))->pluck('id');
                $subject->students()->attach($student);
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
