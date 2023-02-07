<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Listing;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// All Listings
Route::get('/', [ListingController::class, 'index']);


//Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])
->middleware('auth');


// Store Listing
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');


// Show Edit Listing form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');


// Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');


// Destroy Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');



// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);


// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');


// Create New User
Route::post('/users', [UserController::class, 'store'])->middleware('guest');


// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');


// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');


// Login User
Route::get('/users/authenticate', [UserController::class, 'authenticate']);

