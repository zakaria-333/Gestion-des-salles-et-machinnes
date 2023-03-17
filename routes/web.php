<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
  return view('welcome');
});
Route::post('/gestionMachine', [AppController::class, 'gestionMachine'])->name('gestionMachine');

Route::get('/gestionMachine', [AppController::class, 'gestionMachine']);
Route::get('/gestionSalle', [AppController::class, 'gestionSalle']);

Route::post('/saveSalle', [AppController::class, 'saveSalle'])->name('saveSalle');
Route::post('/removeSalle/{id}', [AppController::class, 'removeSalle'])->name('removeSalle');

Route::post('/saveMachine', [AppController::class, 'saveMachine'])->name('saveMachine');
Route::post('/removeMachine/{id}', [AppController::class, 'removeMachine'])->name('removeMachine');

Route::post('/showSalle/{id}', [AppController::class, 'showSalle'])->name('showSalle');
Route::post('/editSalle', [AppController::class, 'editSalle'])->name('editSalle');

Route::post('/showMachine/{id}', [AppController::class, 'showMachine'])->name('showMachine');
Route::post('/editMachine', [AppController::class, 'editMachine'])->name('editMachine');


Route::get('/chart', [AppController::class, 'statistique']);
