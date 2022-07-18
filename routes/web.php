<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::view('/login', 'Signin/login')->name('login');

Route::post('/checkLogin', [UserController::class, 'checkLogin'])->name('checkLogin');

Route::prefix('user')->group(function () {

    Route::middleware(['auth'])->group(function () {

        Route::match(['get', 'post'], '/your-profile', [UserController::class, 'profile'])->name('user.profile');

        Route::get('/checkLogout', [UserController::class, 'checkLogout'])->name('user.checkLogout')->middleware('auth');
    });
});

Route::middleware(['auth', 'check.role'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::prefix('managementUser')->group(function () {

            Route::get(
                '/',
                [AdminController::class, 'userManagement']
            )->name('admin.managementUser');

            Route::get('profileUser/{id}', function ($id) {
                return route('yprofile');
            })->name('admin.managementUser.uprofile');

            Route::get('createUser', [AdminController::class, 'showInsertUser'])->name('admin.managementUser.insertUser');

            Route::post('checkInsertUser', [AdminController::class, 'createUser'])->name('admin.managementUser.checkInsertUser');

            Route::post('updateUser',  [AdminController::class, 'updateInforUser'])->name('admin.managementUser.updateUser');

            Route::get('destroyUser', [AdminController::class, 'destroyUser'])->name('admin.managementUser.deleteUser');

            Route::get('editUser', [AdminController::class, 'ShowEditUser'])->name('admin.managementUser.editUser');

            Route::post('check-editUser', [AdminController::class, 'editUser'])->name('admin.managementUser.check-editUser');
        });

        Route::prefix('managementCourse')->group(function () {

            Route::middleware(['auth'])->group(function () {

                Route::get('/', [AdminController::class, 'CourseManagement'])->name('admin.managementCourse');
                Route::get('createCourse', [AdminController::class, 'showInsertcourse'])->name('admin.managementCourse.insertCourse');
                Route::post('checkInsertCourse', [AdminController::class, 'createCourse'])->name('admin.managementCourse.checkInsertCourse');
                Route::get('destroyCourse', [AdminController::class, 'destroycourse'])->name('admin.managementCourse.deleteCourse');
                Route::get('showCourse', [AdminController::class, 'showCourse'])->name('admin.managementCourse.showCourse');
                Route::post('updateCourse', [AdminController::class, 'updateCourse'])->name('admin.managementCourse.updateCourse');
            });
        });
    });
});

Route::get('/', [UserController::class, 'index'])->name('index');