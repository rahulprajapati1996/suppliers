<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SupplierProjectController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\InitController;
use App\Http\Controllers\RespondentController;

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



Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}',  [VerificationController::class, 'verify'])->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
    Route::group(['middleware' => ['verified']], function () {
        Route::get('/', [WelcomeController::class, 'index']);
    });
});
Route::middleware(['auth'])->group(function () {

    Route::resources(
        ['client' => ClientController::class,],
    );
    Route::resources(
        ['supplier' => SupplierController::class],
    );
    Route::resources(
        ['user' => UserController::class,],
    );
    Route::group(['prefix' => 'supplier'], function () {
        Route::post('/project', [SupplierProjectController::class, 'store']);
        Route::get('/project/{id}/edit', [SupplierProjectController::class, 'edit']);
        Route::post('/project/update', [SupplierProjectController::class, 'update']);
        Route::get('/project/delete/{id}', [SupplierProjectController::class, 'destroy']);
    });
    Route::resources(['project' => ProjectController::class,]);
    Route::post('/project/add/link', [ProjectController::class, 'addLink']);
    Route::get('supplier-project/download', [SupplierProjectController::class, 'downloadExcel']);

    Route::group(['prefix' => 'account'], function () {
        Route::get('profile', [AccountController::class, 'index']);
        Route::put('profile/{id}', [AccountController::class, 'updateProfile']);
        Route::put('password', [AccountController::class, 'updatePassword']);
    });
    Route::get('countries',[CountryController::class,'index']);
});

Route::get('surveyInit/{id}', [InitController::class, 'index']);

Route::group(['prefix' => 'respondent'], function () {
    Route::get('', [RespondentController::class, 'index']);
});


Route::group(['prefix' => 'redirect'], function () {
    Route::get('complete', [RedirectController::class, 'complete']);
    Route::get('terminate', [RedirectController::class, 'terminate']);
    Route::get('overquota', [RedirectController::class, 'overquota']);
    Route::get('sec_terminate', [RedirectController::class, 'secTerminate']);
});
