<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResumeController;
use Illuminate\Support\Facades\Route;

// ajax call routes

Route::get('heroData',[HomeController::class,'heroData']);
Route::get('aboutData',[HomeController::class,'aboutData']);
Route::get('socialData',[HomeController::class,'socialData']);
Route::get('projectsData',[ProjectController::class,'projectsData']);
Route::get('resumeLink',[ResumeController::class,'resumeLink']);
Route::get('experienceData',[ResumeController::class,'experienceData']);
Route::get('educationData',[ResumeController::class,'educationData']);
Route::get('skillsData',[ResumeController::class,'skillsData']);
Route::get('languageData',[ResumeController::class,'languageData']);
Route::post('contactRequest',[ContactController::class,'contactRequest']);
