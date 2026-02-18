<?php

use App\Http\Controllers\DownloadCalendarController;
use App\Services\LaraconScheduleService;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/download', DownloadCalendarController::class)->name('calendar.download');

Route::get('/calendar.ics', function (LaraconScheduleService $scheduleService) {
    return response($scheduleService->getCalendarString())
        ->header('Content-Type', 'text/calendar; charset=utf-8');
})->name('calendar.ics');
