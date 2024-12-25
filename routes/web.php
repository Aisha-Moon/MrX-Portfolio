<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\admin\api\UserController;


Route::post('/user-registration', [UserController::class, 'signup']);
Route::post('/user-login', [UserController::class, 'login']);
Route::post('/send-otp', [UserController::class, 'sendOtpCode']);
Route::post('/verify-otp', [UserController::class, 'verifyOtpCode']);
Route::post('/reset-password', [UserController::class, 'ResetPass'])->middleware('tokenVerify');
Route::get('/logout',[UserController::class,'UserLogout']);
Route::post('/user-update',[UserController::class,'UpdateProfile'])->middleware('tokenVerify');

//page routes

Route::get('/',[HomeController::class,'page']);
Route::get('/contact',[ContactController::class,'page']);
Route::get('/projects',[ProjectController::class,'page']);
Route::get('/resume',[ResumeController::class,'page']);

Route::get('/userLogin',[UserController::class,'LoginPage']);
Route::get('/userRegistration',[UserController::class,'RegistrationPage']);
Route::get('/sendOtp',[UserController::class,'SendOtpPage']);
Route::get('/verifyOtp',[UserController::class,'VerifyOTPPage']);
Route::get('/resetPassword',[UserController::class,'ResetPasswordPage'])->middleware('tokenVerify');
Route::get('/dashboard',[DashboardController::class,'DashboardPage'])->middleware('tokenVerify');
Route::get('/user-profile',[UserController::class,'UserProfile'])->middleware('tokenVerify');
Route::get('/userProfile',[UserController::class,'ProfilePage'])->middleware('tokenVerify');
Route::get('heroPage', [DashboardController::class, 'heroPage'])->name('hero.page')->middleware('tokenVerify');
Route::get('customerPage', [CustomerController::class, 'page'])->name('customers.page')->middleware('tokenVerify');
Route::get('productPage', [ProductController::class, 'page'])->name('products.page')->middleware('tokenVerify');
Route::get('/invoicePage',[InvoiceController::class,'InvoicePage'])->middleware('tokenVerify');
Route::get('/salePage',[InvoiceController::class,'SalePage'])->middleware('tokenVerify');
Route::get('/reportPage',[ReportController::class,'ReportPage'])->middleware('tokenVerify');
