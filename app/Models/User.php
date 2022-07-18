<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    protected $fillable = ['id', 'name', 'email', 'password', 'avata', 'role'];
    public $timestamps = false;

    public function userCourses()
    {
    	return $this->belongsToMany(Courses::class,UserCourses::class,'id_user', 'id_course')->withPivot('id');
    }

    public function us()
    {
        return $this->hasMany(UserCourses::class,'id_user');
    }
}
