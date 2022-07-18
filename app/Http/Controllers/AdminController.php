<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Courses;
use App\Models\UserCourses;
use \App\Http\Requests\CreateUser;
use \App\Http\Requests\UpdateUser;
use \App\Http\Requests\CreateCourse;
use \App\Http\Requests\UpdateCourse;

class AdminController extends Controller
{
    public function index()
    {
        return view('Signin/login');
    }

    public function userManagement()
    {
        $users = User::paginate(5);
        $users->withPath('managementUser');

        return view('Admin.UserManagement', ['users' => $users]);
    }

    public function showInsertUser()
    {
        $listCourses = Courses::all();
        return view('Acount.InsertUser', ['listCourses' => $listCourses]);
    }

    public function updateInforUser(UpdateUser $request)
    {
        $checkEmail = User::find($request->post('id'));
        if ($checkEmail->email == $request->input('email') || User::where('email', $request->input('email'))->count() < 1 ) {
            if ($request->file('file') != null) {
                $path = $request->file('file')->move(public_path('mau/assets/img/avatars'), $request->file('file')->getClientOriginalName());
                if (!$path) {
                    return redirect()->back()->withErrors('File error');
                }
                User::where('id', $request->input('id'))
                    ->update([
                        'avata' => $request->file('file')->getClientOriginalName()
                    ]);
            }

            $check = User::where('id', $request->input('id'))
                ->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'role' => $request->input('role'),
                ]);

            if ($request->input('check_register_course')) {
                foreach ($request->input('check_register_course') as $key => $value) {
                    UserCourses::insert([
                        'id_user' => $request->input('id'),
                        'id_course' => $value
                    ]);
                }
            }

            if ($request->input('check_user_course')) {
                foreach ($request->input('check_user_course') as $key => $value) {
                    UserCourses::where([
                        'id_user' => $request->input('id'),
                        'id_course' => $value
                    ])->delete();
                }
            }

            return redirect()->back();
        }

        return redirect()->back()->withErrors('Email already in use');
    }

    public function destroyUser(Request $request)
    {
        $deleted = User::where('id', $request->input('id'))->delete();

        return redirect()->back();
    }

    public function createUser(CreateUser $request)
    {
        $path = $request->file('file')->move(public_path('mau/assets/img/avatars'), $request->file('file')->getClientOriginalName());
        
        if (!$path) {
            return redirect()->back()->withErrors('File error');
        }

        if (User::where('email', $request->input('email'))->count()  < 1) {
            $check = User::insert([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'avata' => $request->file('file')->getClientOriginalName(),
                'password' => bcrypt($request->input('password')),
                'role' => $request->input('role'),
            ]);

            if ($check) {
                $newUserId =  User::where('email', $request->input('email'))->value('id');
                if ($request->input('check_register_course')) {
                    foreach ($request->input('check_register_course') as $key => $value) {
                        UserCourses::insert([
                            'id_user' => $newUserId,
                            'id_course' => $value
                        ]);
                    }
                }

                return redirect()->route('admin.manageUser');
            }

            return redirect()->back()->withErrors('Account error');
        }

        return redirect()->back()->withErrors('Email already in use');
    }


    public function courseManagement()
    {
        $courses = courses::paginate(5);
        $courses->withPath('managementCourse');
        return view('Admin.CourseManagement', ['courses' => $courses]);
    }

    public function showInsertcourse()
    {
        return view('Courses.insertCourse');
    }

    public function createCourse(CreateCourse $request)
    {
        $insertCourse = Courses::insert([
            'course_name' => $request->input('course_name'),
            'course_description' => $request->input('course_description'),
            'course_content' => $request->input('course_content'),
            'course_author_id' => Auth::user()->id
        ]);

        if ($insertCourse) {
            return redirect()->route('admin.manageCourse');
        }

        return redirect()->back()->withErrors('Error');
    }

    public function showCourse(Request $request)
    {
        $course = Courses::first();
        return view('Courses.ShowCourse', ['course' => $course]);
    }

    public function destroyCourse(Request $request)
    {
        $deleted = Courses::where('id', $request->input('id'))->delete();
        return redirect()->back();
    }

    public function updateCourse(CreateCourse $request)
    {
        if ($request->input()) {
            $insertCourse = Courses::where('id', $request->input('id'))
                ->update([
                    'course_name' => $request->input('course_name'),
                    'course_description' => $request->input('course_description'),
                    'course_content' => $request->input('course_content'),
                    'course_author_id' => Auth::user()->id
                ]);
            if ($insertCourse) {
                return redirect()->route('admin.manageCourse');
            }
            return redirect()->back()->withErrors('Error Sql');
        }
        return redirect()->back()->withErrors('Error request');
    }
}
