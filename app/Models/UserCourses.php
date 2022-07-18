<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCourses extends Model
{
    use HasFactory;
    protected $table = 'user_courses';
    protected $fillable = ['id', 'id_user', 'id_course' ];
    public $timestamps = false;
}
