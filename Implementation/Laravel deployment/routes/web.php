<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentsController;
use App\Http\Controllers\ParentStudentController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('parentstudent/export/', [App\Http\Controllers\ParentStudentController::class, 'export']);
Route::get('student/export/', [App\Http\Controllers\StudentController::class, 'export']);
Route::get('parents/export/', [App\Http\Controllers\ParentsController::class, 'export']);



Route::controller(PaymentController::class)
    ->prefix('payments')
    ->as('payments.')
    ->group(function () {
        Route::post('/initiatepush', 'initiateStkPush')->name('initiatepush');
        Route::get('/token', 'token')->name('token');
        Route::post('/stkCallback', 'stkCallback')->name('stkCallback');
        Route::get('/stkquery', 'stkQuery')->name('stkquery');
        Route::get('/registerurl', 'registerurl')->name('registerurl');
        Route::post('/validation', 'Validation')->name('validation');
        Route::post('/confirmation', 'Confirmation')->name('confirmation');
        Route::get('/simulate', 'Simulate')->name('simulate');
        Route::post('/b2b', 'b2b')->name('b2b');
    });

Route::post('/check-email', [UserController::class, 'checkUserEmail']);
Route::post('/payments', [PaymentController::class, 'callback']);

Route::get('/accounts', [PaymentController::class, 'showAccounts'])->name('accounts.show');

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');

Route::resource('students', StudentController::class);
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::post('/students/upload', [StudentController::class, 'upload'])->name('students.upload');

Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');

Route::resource('users', UserController::class);
Route::get('users/{userId}/delete', [UserController::class, 'destroy']);

Route::get('/students/imports', [StudentController::class, 'index'])->name('students.index');
Route::post('/students/imports', [StudentController::class, 'importExcelData'])->name('students.import');

Route::get('/parents/imports', [ParentsController::class, 'index'])->name('parents.index');
Route::post('/parents/imports', [ParentsController::class, 'importExcelData'])->name('parents.import');

Route::get('parent-student', [ParentStudentController::class, 'index']);
Route::post('parent-student/import', [ParentStudentController::class, 'import']);

Route::get('/parent-student-relations', [ParentStudentController::class, 'index']);
Route::post('/parent-student-relations', [ParentStudentController::class, 'store']);
Route::post('/parent-student/import', [ParentStudentController::class, 'import']);

Route::get('/prediction', [PredictionController::class, 'index'])->name('prediction.index');

Route::resource('admin/employees', App\Http\Controllers\Admin\employeesController::class)
    ->names([
        'index' => 'admin.employees.index',
        'store' => 'admin.employees.store',
        'show' => 'admin.employees.show',
        'update' => 'admin.employees.update',
        'destroy' => 'admin.employees.destroy',
        'create' => 'admin.employees.create',
        'edit' => 'admin.employees.edit'
    ]);
Route::resource('polls', App\Http\Controllers\PollController::class);

Route::resource('uploads', App\Http\Controllers\UploadController::class);
Route::get('/upload', [UploadController::class, 'index']);
Route::post('/uploadFile', [UploadController::class, 'uploadFile'])->name('uploadFile');

Route::prefix('poll')->middleware('auth')->group(function(){
    Route::view('create', 'polls.create')->name('poll.create');
    Route::post('create', [PollController::class, 'store'])->name('poll.store');
    Route::get('/', [PollController::class,'index'])->name('poll.index');
    Route::get('/update/{poll}', [PollController::class,'edit'])->name('poll.edit');
    Route::put('/update/{poll}', [PollController::class,'update'])->name('poll.update');
    Route::get('delete/{poll}',[PollController::class,'delete'])->name('poll.delete');

    Route::get('/{poll}', [PollController::class,'show'])->name('poll.show');
    Route::post('/{poll}/vote', [PollController::class,'vote'])->name('poll.vote');
});
Route::resource('grades', App\Http\Controllers\GradeController::class);
Route::resource('schedules', App\Http\Controllers\ScheduleController::class);
Route::resource('breaks', App\Http\Controllers\BreakController::class);
Route::resource('teachers', App\Http\Controllers\TeacherController::class);

Route::get('timetable/export/pdf', [TimetableController::class, 'exportPDF'])->name('timetable.export.pdf');
Route::post('generate-timetable-by-grade', [TimetableController::class, 'generateTimetableForGrade'])->name('generate.timetable.by.grade');
Route::get('/generate-timetable/{gradeId}', [TimetableController::class, 'generateTimetableForGrade']);
Route::get('/generate-timetable', [TimetableController::class, 'generateTimetable'])->name('generate.timetable');
Route::get('/timetable', [TimetableController::class, 'index'])->name('timetable');
Route::resource('timetables', TimetableController::class);
Route::delete('/timetable', [TimetableController::class, 'destroy'])->name('delete.timetable');
Route::resource('roles', App\Http\Controllers\RoleController::class);
Route::resource('permissions', App\Http\Controllers\PermissionController::class);

Route::resource('users', UserController::class);
Route::get('users/{userId}/delete', [UserController::class, 'destroy']);

