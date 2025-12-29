<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\ApplicantController;
use App\Models\Cat;

Route::get('/', function () {
    $cats = Cat::where('status', 'Available')->get();
    return view('home', compact('cats'));
})->name('home');

Route::get('/about-more', function () {
    return view('about-more');
})->name('about');

Route::get('/cats', function () {
    $cats = Cat::where('status', 'Available')->get();
    return view('cats', compact('cats'));
})->name('cats');

Route::get('/adoption-form/{cat}', function (Cat $cat) {
    return view('adoption-form', compact('cat'));
})->name('adoption.form');

Route::post('/adoption-form', [AdoptionController::class, 'store'])->name('adoption.store');

Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

Route::post('/admin/login', [AdminController::class, 'handleLogin'])
    ->name('admin.login.submit');

Route::get('/admin/dashboard', [AdminController::class, 'showDashboard'])
    ->name('admin.dashboard');

Route::get('/admin/input_cats', [AdminController::class, 'showInputCats'])
    ->name('admin.cats.create');

Route::post('/admin/input_cats', [AdminController::class, 'storeCat'])
    ->name('admin.cats.store');

Route::get('/admin/applicants', function () {
    $applicants = \App\Models\AdoptionApplication::with('cat')
        ->where('status', 'Pending')
        ->get();
    return view('admin.applicants_req', compact('applicants'));
})->name('admin.applicants');


Route::post('/admin/adoption/{id}/accept', [AdminController::class, 'acceptAdoption'])
    ->name('admin.adoption.accept');
    
Route::post('/admin/adoption/{id}/decline', [AdminController::class, 'declineAdoption']);

Route::post('/admin/cat/{id}/delete', [AdminController::class, 'deleteCat'])
    ->name('admin.cat.delete');
