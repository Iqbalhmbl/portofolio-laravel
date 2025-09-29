<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/detail-projects/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('detail');
Route::get('/admin/index', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('admin.index')->middleware('auth');
Route::resource('skills', App\Http\Controllers\SkillController::class)->middleware('auth');
Route::resource('educations', App\Http\Controllers\EducationController::class)->middleware('auth');
Route::resource('experiences', App\Http\Controllers\ExperienceController::class)->middleware('auth');
Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects.index')->middleware('auth');
Route::get('/projects/create', [App\Http\Controllers\ProjectController::class, 'create'])->name('projects.create')->middleware('auth');
Route::post('/projects', [App\Http\Controllers\ProjectController::class, 'store'])->name('projects.store')->middleware('auth');
Route::get('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'show'])->name('projects.show')->middleware('auth');
Route::get('/projects/{project}/edit', [App\Http\Controllers\ProjectController::class, 'edit'])->name('projects.edit')->middleware('auth');
Route::put('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'update'])->name('projects.update')->middleware('auth');
Route::delete('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'destroy'])->name('projects.destroy')->middleware('auth');

Route::delete('/projects/{project}/files/{file}', [App\Http\Controllers\ProjectController::class, 'deleteFile'])->name('projects.deleteFile');

Route::post('/contact/send', [HomeController::class, 'sendContact'])->name('contact.send');