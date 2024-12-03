<?php

use App\Http\Controllers\Admin\AnnoucementsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminAuthLoginController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\TeachersController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\AnnouncementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::prefix('login')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'login'])->name('login.post');
    Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
});
Route::get('/dashboard', [DashBoardController::class, 'index'])->name('login.dashboard');

// Students routes
Route::get('/students', [StudentsController::class, 'index'])->name('students');
Route::get('/students/create', [StudentsController::class, 'create'])->name('students.create');
Route::post('/students/store', [StudentsController::class, 'store'])->name('students.store');
Route::get('/students/edit/{id}', [StudentsController::class, 'edit'])->name('students.edit');
Route::post('/students/update/{id}', [StudentsController::class, 'update'])->name('students.update');
Route::post('/students/delete/{id}', [StudentsController::class, 'delete'])->name('students.delete');
//Announcement routes
Route::get('/annoucements', [AnnouncementController::class, 'index'])->name('annoucements');
Route::get('/annoucements/create', [AnnouncementController::class, 'create'])->name('annoucements.create');
Route::post('/annoucements/store', [AnnouncementController::class, 'store'])->name('annoucements.store');
Route::get('/annoucements/edit/{id}', [AnnouncementController::class, 'edit'])->name('annoucements.edit');
Route::post('/annoucements/update/{id}', [AnnouncementController::class, 'update'])->name('annoucements.update');
Route::post('/annoucements/delete/{id}', [AnnouncementController::class, 'delete'])->name('annoucements.delete');


// Admin routes
Route::prefix('admin')->as('admin.')->group(function () {
    Route::prefix('auth')->as('auth.')->group(function () {
        Route::get('/login', [AdminAuthLoginController::class, 'index'])->name('login');
        Route::post('/login/post', [AdminAuthLoginController::class, 'login'])->name('login.post');
        Route::get('/logout', [AdminAuthLoginController::class, 'logout'])->name('logout')->middleware('admin');
    });
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard')->middleware('admin');
    //Teachers
    Route::get('/teachers', [TeachersController::class, 'index'])->name('teachers')->middleware('admin');
    Route::get('/teachers/create', [TeachersController::class, 'create'])->name('teachers.create')->middleware('admin');
    Route::post('/teachers/store', [TeachersController::class, 'store'])->name('teachers.store')->middleware('admin');
    Route::get('/teachers/edit/{id}', [TeachersController::class, 'edit'])->name('teachers.edit')->middleware('admin');
    Route::post('/teachers/update/{id}', [TeachersController::class, 'update'])->name('teachers.update')->middleware('admin');
    Route::post('/teachers/delete/{id}', [TeachersController::class, 'delete'])->name('teachers.delete')->middleware('admin');
    
    
    Route::get('/students', [TeachersController::class, 'students'])->name('students')->middleware('admin');

    //Annoucement
    Route::get('/annoucements', [AnnoucementsController::class, 'index'])->name('annoucements')->middleware('admin');
    Route::get('/annoucements/create', [AnnoucementsController::class, 'create'])->name('annoucements.create')->middleware('admin');
    Route::post('/annoucements/store', [AnnoucementsController::class, 'store'])->name('annoucements.store')->middleware('admin');
    Route::get('/annoucements/edit/{id}', [AnnoucementsController::class, 'edit'])->name('annoucements.edit')->middleware('admin');
    Route::post('/annoucements/update/{id}', [AnnoucementsController::class, 'update'])->name('annoucements.update')->middleware('admin');
    Route::post('/annoucements/delete/{id}', [AnnoucementsController::class, 'delete'])->name('annoucements.delete')->middleware('admin');


});

