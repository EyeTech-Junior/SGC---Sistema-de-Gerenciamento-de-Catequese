<?php
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ClassroomController::class, 'home'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [ClassroomController::class, 'home'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/error', function () {
    return view('fracasso');
})->name('fracasso');

//rotas de registro do estudante
Route::get('/registrar', [StudentController::class, 'registro'])->name('registro');
Route::post('registrar', [StudentController::class, 'registrar'])->name('registrar');

//rotas do breeze
Route::middleware('auth')->group(function () {
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::any('profile/editar', [ProfileController::class, 'edit'])->name('profile.editar');
    Route::any('exit', [AuthenticatedSessionController::class, 'destroy'])->name('exit');
});

Route::middleware(['auth'])->prefix('classroom')->name('classroom.')->group(function() {
    Route::get('classroom-list', [ClassroomController::class, 'list'])->name('list');
    Route::any('classroom-show', [ClassroomController::class, 'show'])->name('show');
    Route::get('/classroom-profile/{id}', [ClassroomController::class, 'profile'])->name('profile');
    Route::get('/classroom-low-profile/{id}', [ClassroomController::class, 'lowProfile'])->name('lowProfile');
    Route::put('/classroom-edit/{id}', [ClassroomController::class, 'edit'])->name('edit');
    Route::get('classroom-create', [ClassroomController::class, 'create'])->name('create');
    Route::post('classroom-store', [ClassroomController::class, 'store'])->name('store');
    Route::any('/classroom-addStudent/{id}', [ClassroomController::class, 'addStudent'])->name('addStudent');
    Route::any('/classroom-addClassroom/{id}', [ClassroomController::class, 'addClassroom'])->name('addClassroom');
    Route::any('/classroom-Student/{id}', [ClassroomController::class, 'studentList'])->name('studentList');
    Route::get('classroom/{id}/{student}', [ClassroomController::class, 'register'])->name('register');
    Route::get('classroom-remove/{id}/{student}', [ClassroomController::class, 'remove'])->name('remove');
    Route::any('classroom-search', [ClassroomController::class, 'searchClass'])->name('searchClass');
    Route::any('classroom-search-student', [ClassroomController::class, 'studentSearch'])->name('studentSearch');
});
Route::middleware(['auth'])->prefix('student')->name('student.')->group(function() {
    Route::get('student-list', [StudentController::class, 'list'])->name('list');
    Route::any('student-show', [StudentController::class, 'show'])->name('show');
    Route::get('/student-profile/{id}', [StudentController::class, 'profile'])->name('profile');
    Route::get('/student-low-profile/{id}', [StudentController::class, 'lowProfile'])->name('lowProfile');
    Route::put('/student-edit/{id}', [StudentController::class, 'edit'])->name('edit');
    Route::get('student-create', [StudentController::class, 'create'])->name('create');
    Route::post('student-store', [StudentController::class, 'store'])->name('store');
    Route::any('student-download', [StudentController::class, 'download'])->name('download');

});

Route::resource('category', CategoryController::class)->middleware(['auth']);
Route::any('category-search', [CategoryController::class, 'search'])->name('category.search')->middleware(['auth']);;

Route::middleware(['auth'])->prefix('coordinator')->name('coordinator.')->group(function() {
    Route::get('coordinator-list', [CoordinatorController::class, 'list'])->name('list');
    Route::any('coordinator-show', [CoordinatorController::class, 'show'])->name('show');
    Route::get('/coordinator-profile/{id}', [CoordinatorController::class, 'profile'])->name('profile');
    Route::get('/coordinator-low-profile/{id}', [CoordinatorController::class, 'lowProfile'])->name('lowProfile');
    Route::put('/coordinator-edit/{id}', [CoordinatorController::class, 'edit'])->name('edit');
    Route::get('coordinator-create', [CoordinatorController::class, 'create'])->name('create');
    Route::post('coordinator-store', [CoordinatorController::class, 'store'])->name('store');
});

Route::middleware(['auth'])->prefix('mail')->name('mail.')->group(function() {
    Route::any('/send/{id}', [MailController::class, 'sendEmail'])->name('send');
});
require __DIR__.'/auth.php';
