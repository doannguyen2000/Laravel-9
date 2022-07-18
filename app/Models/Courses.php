<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $fillable = ['id', 'course_name', 'course_description', 'course_content', 'course_author_id'];
    public $timestamps = false;

    public function userCourses()
    {
    	return $this->belongsToMany(User::class,UserCourses::class, 'id_course','id_user');
    }
}
