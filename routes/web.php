<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Listing;

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
Route::get('/', [\App\Http\Controllers\ListingController::class, 'index']);


// Single Listing
Route::get('/listings/{listing}', [\App\Http\Controllers\ListingController::class, 'show']);

// Crate Listing


// Store Listing


// Edit Listing


// Update Listing


// Destroy Listing

