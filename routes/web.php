<?php

use App\Http\Controllers\ListingController;
use Illuminate\Support\Request;
use Illuminate\Support\Facades\Route;
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


// Common resource routes:
// index - show all listings
// show - show single listing
// create - show form to create new listing
// store - store new listing
// edit - show form to edit listing
// update - update listing
// destroy - delete listing

//WORK FLOW = route, controller and view for anything added

//All listings
Route::get('/', [ListingController::class, 'index']);

// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create']);

// Store listing data - post request
Route::post('/listings', [ListingController::class, 'store']); //calling the store method which is created in the controllers

// Show Edit Form

Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

// Update listing

Route::put('/listings/{listing}', [ListingController::class, 'update']);

// Delete listing

Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

//Single listing - has to be at the end
Route::get('/listings/{listing}', [ListingController::class, 'show']);