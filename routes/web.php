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
Route::get('aboutPage', [DashboardController::class, 'aboutPage'])->name('about.page')->middleware('tokenVerify');
Route::get('experience', [DashboardController::class, 'experience'])->name('experience.page')->middleware('tokenVerify');
Route::get('education', [DashboardController::class, 'education'])->name('education.page')->middleware('tokenVerify');
Route::get('skill', [DashboardController::class, 'skill'])->name('skill.page')->middleware('tokenVerify');
Route::get('languages', [DashboardController::class, 'language'])->name('language.page')->middleware('tokenVerify');
Route::get('resumePage', [DashboardController::class, 'resume'])->name('resume.page')->middleware('tokenVerify');
Route::get('projectPage', [DashboardController::class, 'projectPage'])->name('project.page')->middleware('tokenVerify');
Route::get('contactPage', [DashboardController::class, 'contactPage'])->name('contact.page')->middleware('tokenVerify');
