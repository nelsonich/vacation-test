<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Models\RBAC\Permission;
use App\Services\UserService;
use App\Services\PermissionResponseService;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\Dashboard\VacationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

View::composer('layouts.appDashboard', function ($view) {
    $permissions = new PermissionResponseService();
    $auth = new UserService();
    $array = Permission::where('parent_id', null)->get();

    $view->with(
        [
            'permissions' => $permissions->get($auth->getById(\auth()->id())->role->id, $array),
            'role' => $auth->getById(\auth()->id())->role,
        ]
    );
});

Route::get('/', [WelcomeController::class, 'index']);

Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('dashboard')->namespace('Dashboard')->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/', [UsersController::class, 'index'])->middleware('permission');
        Route::post('/add', [UsersController::class, 'addUser'])->name('users.add');
        Route::post('/delete', [UsersController::class, 'deleteUser'])->name('users.delete');
        Route::post('/update', [UsersController::class, 'editUser'])->name('users.update');
    });

    Route::prefix('vacations')->group(function () {
        Route::get('/', [VacationController::class, 'index'])->middleware('permission');
        Route::post('/add', [VacationController::class, 'addVacation'])->name('vacations.add');
        Route::get('/approve/{userId}', [VacationController::class, 'approveVacation'])->name('vacations.approve');
    });
});
