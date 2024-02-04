<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;


Route::controller(EventController::class)->group(function () {
    Route::get('/events', 'index')->name('events.index');
    Route::post('/events', 'store')->name('events.store');
  //  Route::get('/events/{event}', 'show')->name('events.show');
  //  Route::put('/events/{event}', 'update')->name('events.update');
  //  Route::delete('/events/{event}', 'destroy')->name('events.destroy');
});