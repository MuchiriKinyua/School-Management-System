<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentsController;
use App\Http\Controllers\ParentStudentController;
use App\Http\Controllers\PredictionController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

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

Route::resource('permissions', PermissionController::class);
Route::get('permissions/{permissionId}/delete', [PermissionController::class, 'destroy']);

Route::resource('roles', RoleController::class);
Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy']);
Route::get('roles/{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole']);
Route::put('roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole']);

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