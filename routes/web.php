<?php

use App\Http\Livewire\Admin\AdminAddMajorComponent;
use App\Http\Livewire\Admin\AdminAddStudentComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditMajorComponent;
use App\Http\Livewire\Admin\AdminEditStudentComponent;
use App\Http\Livewire\Admin\AdminMajorsComponent;
use App\Http\Livewire\Admin\AdminStudentsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\StudentComponent;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/', HomeComponent::class)->name('home');

Route::get('/student', StudentComponent::class)->name('home.student');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware(['auth', 'authadmin'])->group(function(){
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/majors', AdminMajorsComponent::class)->name('admin.majors');
    Route::get('/admin/major/add', AdminAddMajorComponent::class)->name('admin.major.add');
    Route::get('/admin/major/edit/{major_id}', AdminEditMajorComponent::class)->name('admin.major.edit');
    Route::get('/admin/students', AdminStudentsComponent::class)->name('admin.students');
    Route::get('/admin/student/add', AdminAddStudentComponent::class)->name('admin.student.add');
    Route::get('/admin/student/edit/{student_id}', AdminEditStudentComponent::class)->name('admin.student.edit');
});

require __DIR__.'/auth.php';
