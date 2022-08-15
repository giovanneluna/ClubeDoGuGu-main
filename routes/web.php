<?php

use App\Http\Controllers\BlocksController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\EquipmentsController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RecordsController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\SportsController;
use App\Http\Controllers\StockEquipmentsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('clients', ClientsController::class);
    Route::resource('sports', SportsController::class);
    Route::resource('equipments', EquipmentsController::class);
    Route::resource('equipment-stocks', StockEquipmentsController::class);
    Route::resource('blocks', BlocksController::class);
    Route::get('blocks/{id}/schedules', [SchedulesController::class, 'create'])->name('schedule.create');
    Route::resource('schedules', SchedulesController::class)->except('create');
    Route::get('pdf', [PdfController::class, 'geraPdf']);
    Route::get('report/schedules', [PdfController::class, 'geraPdf'])->name('report.schedules');
    Route::get('report/{id}/schedule', [PdfController::class, 'onlySchedulePdf']);
    Route::get('report', [ReportController::class, 'report'])->name('report.index');
});