<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\EkskulAssignmentController;

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

Route::get('/', function () {
    return view('home'
        /*,[
            'name' => 'anto',
            'role' => 'admin',
            'buah' => ['apel', 'pisang', 'jeruk']
        ]*/
    );
})->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');


Route::get('/students', [StudentController::class, 'index'])->middleware('auth');
Route::get('/students/{id}', [StudentController::class, 'show'])->middleware(['auth','must-admin-or-teacher']);
Route::get('/student-add', [StudentController::class, 'create'])->middleware('auth');
Route::post('/student', [StudentController::class, 'store'])->middleware('auth');
Route::get('/student-edit/{id}', [StudentController::class, 'edit'])->middleware('auth');
Route::put('/student/{id}', [StudentController::class, 'update'])->middleware('auth');
Route::get('/student-delete/{id}', [StudentController::class, 'delete'])->middleware(['auth','must-admin']);
Route::delete('/student-destroy/{id}', [StudentController::class, 'destroy'])->middleware('auth');
Route::get('/student-deleted', [StudentController::class, 'deletedStudent'])->middleware('auth');
Route::get('/student/{id}/restore', [StudentController::class, 'restore'])->middleware('auth');

Route::get('/class', [ClassController::class, 'index'])->middleware('auth');
Route::get('/class/{id}', [ClassController::class, 'show']);

Route::get('/ekskul', [EkskulController::class, 'index'])->middleware('auth');
Route::get('/ekskul/{id}', [EkskulController::class, 'show']);
Route::post('/ekskul-get-price', [EkskulController::class, 'getPrice']);

Route::get('/teacher', [TeacherController::class, 'index'])->middleware('auth');
Route::get('/teacher/{id}', [TeacherController::class, 'show']);

Route::get('/ekskul-asig', [EkskulAssignmentController::class, 'index'])->middleware('auth');
Route::post('/ekskul-asig-add', [EkskulAssignmentController::class, 'assign'])->middleware('auth');


Route::get('/contact', function () {
    return view('contact', ['name' => 'cara aku', 'phone' => '0812xxxxxxx']);
});

Route::get('/product/{id}', function ($id) {
    // return 'product '.$id;
    return view('product.detail', ['id' => $id]);
});

// Route::view('/contact', 'contact', ['name' => 'cara aku', 'phone' => '0812xxxxxxx']);

Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        return 'this is admin users';
    });
    Route::get('/vendors', function () {
        return 'this is admin vendors';
    });
});

