<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\CustomerRegistration;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Livewire\EmployeeList;
use App\Livewire\EmployeeDetails;
use App\Mail\InvoiceMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;

Route::get('/send-test-email', function () {
    Mail::to('ramkumar742k@gmail.com')->send(new InvoiceMail());
    return 'Test email sent!';
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/employee', [AdminController::class, 'employee']);
    Route::get('/employee-list',[AdminController::class,'employeeList'])->name('employee.list');
    Route::get('/bridal_booking',[AdminController::class,'bridal_booking'])->name('bridal_booking');
    Route::get('/bridal_booking_calendar',[AdminController::class,'bridal_booking_calendar'])->name('bridal_booking_calendar');
    Route::get('/expense', [AdminController::class, 'expense']);
    Route::get('/attendance', [AdminController::class, 'attendance']);
    Route::get('/invoice', [AdminController::class, 'invoice']);
    Route::get('/invoice_list', [AdminController::class, 'invoice_list']);
    Route::get('/invoice_print/{invoice_id}', [AdminController::class, 'invoice_print'])->name('invoice.show');
    Route::get('sales_report', [AdminController::class, 'sales_report'])->name('sales_report');

    //Expense report
    Route::get('expense_report', [AdminController::class, 'expense_report'])->name('expense_report');
    
    
    // routes/web.php
Route::get('/print', [AdminController::class, 'printReceipt']);

    // Route::get('invoice', function(){
    //     return view('invoice');
    // });
    // Add more admin routes here
});

Route::middleware(['user'])->group(function () {
    Route::get('/user', [UserController::class, 'index']);
    // Add more user routes here
});

Route::get('/', function () {
    return view('auth.login');
});
