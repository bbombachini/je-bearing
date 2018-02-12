<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    // use Notifiable;
    // protected $table = 'tbl_person';
    // protected $primaryKey = 'person_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // 'person_name', 'person_email', 'person_password',
        'fname', 'lname', 'email', 'password', 'employee_id', 'phone', 'photo', 'role', 'assembly_access', 'repair_access', 'instructions_access', 'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // 'person_password', 'remember_token',
        'password', 'remember_token'

    ];
}
