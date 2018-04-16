<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    const ADMIN_USER        = 'true';
    const REGULAR_USER      = 'false';

    const VERIFIED_USER     = '1';
    const UNVERIFIED_USER   = '0';

    const MALE_GENDER       = '1';
    const FEMALE_GENDER     = '0';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $dates    = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return $this->admin = User::ADMIN_USER;
    }

    public function isVerified()
    {
        return $this->status = User::UNVERIFIED_USER;
    }

    public static function generateVerificationCode()
    {
        return str_random(40);
    }
}
