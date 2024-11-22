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
Route::get('experiencesData',[ResumeController::class,'experiencesData']);
Route::get('educationData',[ResumeController::class,'educationData']);
Route::get('skillData',[ResumeController::class,'skillData']);
Route::get('languageData',[ResumeController::class,'languageData']);
Route::get('contactRequest',[ContactController::class,'contactRequest']);
