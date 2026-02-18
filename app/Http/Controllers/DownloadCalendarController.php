<?php

namespace App\Http\Controllers;

use App\Services\LaraconScheduleService;
use Illuminate\Http\Response;

class DownloadCalendarController extends Controller
{
    public function __invoke(LaraconScheduleService $scheduleService): Response
    {
        $calendar = $scheduleService->getCalendarString();

        return response($calendar)
            ->header('Content-Type', 'text/calendar; charset=utf-8')
            ->header('Content-Disposition', 'attachment; filename="laracon-eu-2026.ics"');
    }
}
