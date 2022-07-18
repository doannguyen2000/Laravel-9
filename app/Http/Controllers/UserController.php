<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Courses;
use \App\Http\Requests\StorePostRequest;

class UserController extends Controller
{
    public function index()
    {
        return view('index', ['courses' => Courses::all()]);
    }

    public function login()
    {
        return view('Signin/login');
    }

    public function checkLogin(StorePostRequest $request)
    {
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            if (Auth::user()->role == 'user') {
                return redirect()->route('index');
            }
            return redirect()->route('admin.manageUser');
        }
        
        return redirect()->back()->withErrors('Account does not exist');
    }

    public function checkLogout()
    {
        Auth::logout();
        return redirect()->route('index');
    }

    public function profile(Request $request)
    {
        //O day co $id nhung tron ham cua whereDoesntHave laij khong xac nhan duoc
        $id = Auth::user()->id;
        if ($request->get('id')) {
            $id = $request->get('id');
        }

        $data = User::where('id', $id)->first();

        $userCourses = User::find($id)->userCourses;

        $allCourses = Courses::whereDoesntHave('userCourses',function(Builder $query) use ($id){
            $query->where('id_user', $id);
        })->get();
        return view('Acount/Profile', ['infor' => $data, 'userCourses' => $userCourses, 'allCourses' => $allCourses]);
    }
}
