<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\admin\api\HeroController;
use App\Http\Controllers\admin\api\AboutController;
use App\Http\Controllers\admin\api\SkillController;
use App\Http\Controllers\admin\api\LanguageController;
use App\Http\Controllers\admin\api\EducationController;
use App\Http\Controllers\admin\api\ExperienceController;
use App\Http\Controllers\admin\api\ResumeController as AdminResumeController;
use App\Http\Controllers\admin\api\ProjectController as AdminProjectController;
use App\Http\Controllers\admin\api\ContactController as AdminContactController;
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


//hero api

Route::get('/hero', [HeroController::class, 'index']);
Route::post('/hero', [HeroController::class, 'storeOrUpdate']);

//about api

Route::get('/about', [AboutController::class, 'index']);
Route::post('/about', [AboutController::class, 'storeOrUpdate']);

//resume api

Route::get('/resume', [AdminResumeController::class, 'index']);
Route::post('/resume', [AdminResumeController::class, 'storeOrUpdate']);

//experience api

Route::apiResource('experience', ExperienceController::class);
//experience api
Route::apiResource('education', EducationController::class);
//skills api
Route::apiResource('skill', SkillController::class);
//Language api
Route::apiResource('language', LanguageController::class);
//project api
Route::apiResource('projects', AdminProjectController::class);
//contact api

Route::get('/contact', [AdminContactController::class, 'index']); 
Route::delete('/contact/{id}', [AdminContactController::class, 'destroy']); 