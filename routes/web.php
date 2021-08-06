<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\DepartementsController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\UserController;
use App\Models\Companies;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Support\Facades\Auth;
 
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware(['auth'])->group(function () {
 
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 
    Route::middleware(['admin'])->group(function () {
        Route::get('admin',             [AdminController::class, 'index']);
        Route::get('/companies',        [CompaniesController::class, 'index'] );
        Route::get('/departements',     [DepartementsController::class, 'index'] );
        Route::get('/employees',        [EmployeesController::class, 'index'] );



        Route::resource('departements', DepartementsController::class);
        Route::resource('companies',    CompaniesController::class);
        Route::resource('employees',    EmployeesController::class);
    });
 
    Route::middleware(['user'])->group(function () {
        Route::get('user', [UserController::class, 'index']);
    });
 
    Route::get('/logout', function() {
        Auth::logout();
        redirect('/');
    });


    
 
});