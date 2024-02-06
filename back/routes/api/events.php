<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventCategoryController;
use App\Http\Controllers\FollowController;
//jwt
use Tymon\JWTAuth\Facades\JWTAuth;

Route::controller(EventController::class)
  ->middleware('auth:api')
  ->group(function () {
    Route::get('/events', 'index')->name('events.index');
    Route::post('/events', 'store')->name('events.store');
    Route::get('/events/{event}', 'show')->name('events.show');
    Route::put('/events/{event}', 'update')->name('events.update');
    Route::delete('/events/{event}', 'destroy')->name('events.destroy');
  });



  //Categories
  Route::controller(EventCategoryController::class)
  ->middleware('auth:api')
  ->group(function () {
    Route::get('/event-categories', 'index')->name('event-categories.index');
    Route::post('/event-categories', 'store')->name('event-categories.store');
    //  Route::get('/event-categories/{eventCategory}', 'show')->name('event-categories.show');
    Route::put('/event-categories/{eventCategory}', 'update')->name('event-categories.update');
    //  Route::delete('/event-categories/{eventCategory}', 'destroy')->name('event-categories.destroy');
  });


  //Follow

  Route::controller(FollowController::class)
  ->middleware('auth:api')
  ->group(function () {
    Route::post('/follow-event', 'followEvent')->name('follow-event');
    Route::post('/unfollow-event', 'unfollowEvent')->name('unfollow-event');
  });