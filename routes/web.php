<?php

use App\Http\Controllers\AttendanceAdmController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AttendanceEmpController;
use App\Http\Controllers\AttendanceUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardEmpController;
use App\Http\Controllers\DashboardOwnController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveAdmController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LeaveOwnController;
use App\Http\Controllers\LeaveReqController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PasswordOwnController;
use App\Http\Controllers\PasswordUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileUserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SalaryController;
use App\Http\Middleware\AdminCheck;
use App\Http\Middleware\EmployeeCheck;
use App\Http\Middleware\OwnerCheck;
use Illuminate\Support\Facades\Route;

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
Route::redirect('/', 'admin/login');
// ADMIN
Route::middleware(AdminCheck::class)->group(function () {
    Route::resource('attendanceAdm', AttendanceAdmController::class);
    Route::resource('leaveAdm', LeaveAdmController::class);
    Route::resource('passUser', PasswordUserController::class);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::put('/attendanceAdm/{id}/reject', [AttendanceAdmController::class, 'reject'])->name('attendanceAdm.reject');
    Route::put('/leaveAdm/{id}/reject', [LeaveAdmController::class, 'reject'])->name('leaveAdm.reject');
});

// OWNER
Route::middleware(OwnerCheck::class)->group(function () {
    Route::resource('attendanceUser', AttendanceUserController::class);
    Route::resource('leaveOwn', LeaveOwnController::class);
    Route::resource('passOwn', PasswordOwnController::class);
    Route::resource('report', ReportController::class);
    Route::get('/dashboardOwner', [DashboardOwnController::class, 'index'])->name('dashboardOwner');
    Route::get('reportView', [ReportController::class, 'reportView'])->name('report.reportView');
    Route::put('/leaveOwn/{id}/reject', [LeaveOwnController::class, 'reject'])->name('leaveOwn.reject');
});

// EMPLOYEE
Route::middleware(EmployeeCheck::class)->group(function () {
    Route::resource('attendanceEmp', AttendanceEmpController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('passEmp', PasswordController::class);
    Route::get('slip', [ReportController::class, 'slip'])->name('report.slip');
    Route::get('/dashboardEmp', [DashboardEmpController::class, 'index'])->name('dashboardEmp');
    Route::resource('leaveReq', LeaveReqController::class);
});

// BERSAMA
Route::resource('attendance', AttendanceController::class);
Route::resource('salary', SalaryController::class);
Route::resource('employee', EmployeeController::class);
Route::resource('profileUser', ProfileUserController::class);
Route::resource('leave', LeaveController::class);
// Route::put('/leave/{id}/reject', [LeaveController::class, 'reject'])->name('leave.reject');
// END BERSAMA

//   LOGIN
Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'loginAdmin'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'authAdmin']);
});

Route::prefix('emp')->group(function () {
    Route::get('/login', [LoginController::class, 'loginEmp'])->name('emp.login');
    Route::post('/login', [LoginController::class, 'authEmp']);
});

// LOGOUT
Route::get('/logout', [LoginController::class, 'logout']);
