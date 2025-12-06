<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\MealPlanController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\UserMetricController;
use App\Http\Controllers\AuthController;

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes (require authentication)
Route::middleware('auth')->group(function () {
    // User Profile
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');

    // Homepage
    Route::get('/', [RecipeController::class, 'index']);

    // Recipe routes
    Route::get('/recipes/suggest', [RecipeController::class, 'suggest']);
    Route::get('/recipes/smart-suggest', [RecipeController::class, 'smartSuggest'])->name('recipes.smartSuggest');
    Route::post('/recipes/add-from-suggest', [RecipeController::class, 'addFromSmartSuggest'])->name('recipes.addFromSmartSuggest');

    // Full resource routes (generates index, create, store, show, edit, update, destroy)
    Route::resource('mealplans', MealPlanController::class)->only(['index', 'store', 'destroy']);
    Route::resource('goals', GoalController::class);
    Route::resource('usermetrics', UserMetricController::class);

    // Confirmation page
    Route::get('/mealplans/confirmation', [MealPlanController::class, 'confirmation'])->name('mealplans.confirmation');
});
?>