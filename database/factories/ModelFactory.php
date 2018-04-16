<?php

use App\Course;
use App\Skill;
use App\Staff;
use App\Subject;
use App\Transcript;
use App\User;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

//===FACTORY OF USER
$factory->define(User::class, function(Faker $faker){
	static $password;
	return [
		'firstname' => $faker->firstName,
		'lastname' => $faker->lastName,
		'email' => $faker->unique()->safeEmail,
		'gender' => $verified = $faker->randomElement([User::MALE_GENDER, User::FEMALE_GENDER]),
		'password' => $password ? : $password = bcrypt('123456'),
		'remember_token' => str_random(10),
		'verified' => $verified = $faker->randomElement([User::UNVERIFIED_USER, User::VERIFIED_USER]),
		'verification_token' => $verified == User::VERIFIED_USER ? null : User::generateVerificationCode(),

	];
});

//===FACTORY OF COURSE
$factory->define(Course::class, function(Faker $faker){
	return [
		'name' => $faker->word,
		'description' => $faker->paragraph(1),
	];
});

//===FACTORY OF SUBJECT
$factory->define(Subject::class, function(Faker $faker){
	return [
		'name' => $faker->word,
		'description' => $faker->paragraph(1),
		'credits' => $faker->numberBetween(1,5),

	];
});

