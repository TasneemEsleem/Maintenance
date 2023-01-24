<?php

use App\Http\Controllers\AdminProfileConroller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProblemController;
use App\Http\Controllers\ProblemStatusController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\RepairProblemController;
use App\Http\Controllers\RepairSparePartController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\SModelController;
use App\Http\Controllers\SparePartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserModelController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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







Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () { //...
        Route::get('/country/{country_id}', [CountryController::class, 'getCity']);

        Route::middleware('guest:admin,user')->group(function () {
            Route::get('{guard}/forgot-password', [ResetPasswordController::class, 'showForgotPassword'])->name('password.request');
            Route::post('forgot-password', [ResetPasswordController::class, 'emailForgetPassword'])->name('password.email');
            Route::get('{guard}/reset-password/{token}', [ResetPasswordController::class, 'showResetPassword'])->name('password.reset');
            Route::post('reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.update');

            Route::get('login/{guard}', [AuthController::class, 'showLogin'])->name('cms.login');
            Route::post('/login', [AuthController::class, 'login']);
            Route::get('/registers', [RegisterController::class, 'registerview'])->name('customer.register');
            Route::post('/registers/store', [RegisterController::class, 'register'])->name('customer.store');
        });


        Route::prefix('auth')->middleware(['auth:user,admin'])->group(function () {

            Route::get('/profileEdit', [ProfileController::class, 'EditProfile'])->name('profile.edit');
            Route::put('/profile/Update', [ProfileController::class, 'profileUpdate'])->name('profile.update');
            Route::get('/editPassword', [AuthController::class, 'editPassword'])->name('admin.editPassword');
            Route::post('/updatePassword', [AuthController::class, 'updatePassword'])->name('admin.updatePassword');
            Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');


        });

        Route::prefix('cms')->middleware(['auth:user,admin'])->group(function () {
            Route::resource('/smodels', SModelController::class);
            Route::resource('/spareparts', SparePartController::class);




            Route::get('/UserModel/category/{id}/brand/{branId}', [CategoryController::class, 'getModel']);


            Route::get('/sparepartss/{spareparts}/models/edit', [SparePartController::class, 'editSparepartModels'])->name('spareparts.edit-models');
            Route::get('/sparepartss/{spareparts}/details', [SparePartController::class, 'SparepartDetails'])->name('spareparts.details');


            Route::put('/spaerparts/models/edit', [SparePartController::class, 'updateSparepartModels']);

            Route::get('/dashboard', [DashboardController::class, 'index'])->name('auth.dashboard');


            Route::get('/UserModel/index', [UserModelController::class, 'indexUserModels'])->name('UsersEquipment.index');
            Route::get('/UserModel/create', [UserModelController::class, 'editUserModels'])->name('users.create-models');
            Route::post('/UserModel/store', [UserModelController::class, 'updateUserModels'])->name('users.store-models');


        });

        Route::prefix('cms')->middleware('auth:admin')->group(function () {

            Route::resource('/admins', AdminController::class);
            Route::resource('/categories', CategoryController::class);
            Route::resource('/brands', BrandController::class);
            Route::resource('/users', UserController::class);




            Route::resource('roles', RoleController::class);

            Route::resource('permissions/role', RolePermissionController::class);
            Route::resource('permissions', PermissionController::class);
            Route::resource('languages', LanguageController::class);



            Route::post('user/change-status/{id}', [UserController::class, 'UserActive'])->name('users.UserActive');
        });
        Route::prefix('cms')->middleware('auth:admin,user')->group(function () {






            Route::resource('/countries', CountryController::class);
            Route::resource('/cities', CityController::class);
            Route::get('/RepairProblem/index', [RepairProblemController::class, 'indexRepairProblem'])->name('RepairProblem.index');


            Route::resource('/problem_status', ProblemStatusController::class);
            Route::post('/problem_status/change-status/{id}', [ProblemStatusController::class, 'ProblemStatusActive'])->name('ProblemStatus.status');






            Route::resource('problems',ProblemController::class);
            Route::resource('repairs',RepairController::class);
            Route::resource('repair_problems',RepairProblemController::class);
            Route::resource('repair_spare_part', RepairSparePartController::class);

                        Route::get('repair_problem/{id}', [RepairProblemController::class, 'repairProblem'])->name('repair.problem');



            Route::prefix('cms')->middleware(['auth:user'])->group(function () {
                //customer
                Route::get('/UserModel/index', [UserModelController::class, 'indexUserModels'])->name('UsersEquipment.index');
                Route::get('/UserModel/create', [UserModelController::class, 'editUserModels'])->name('users.create-models');
                Route::put('/UserModel/store', [UserModelController::class, 'updateUserModels'])->name('users.store-models');
            });



        });

            //   Route::prefix('cms/')->middleware(['auth:user'])->group(function () {
            //     Route::get('verify', [EmailVerificationController::class, 'notice'])->name('verification.notice');
            //     Route::get('send-verification', [EmailVerificationController::class, 'send'])->name('verification.send');
            //     Route::get('verify/{id}/{hash}', [EmailVerificationControllerr::class, 'verify'])->middleware('signed')->name('verification.verify');
            // });

    }


);
