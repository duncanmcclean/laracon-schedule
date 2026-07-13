<?php

namespace App\Http\Controllers;

use App\Services\LaraconScheduleService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DownloadCalendarController extends Controller
{
    public function __invoke(Request $request, LaraconScheduleService $scheduleService): Response
    {
        $onlineOnly = $request->boolean('online');
        $calendar = $scheduleService->getCalendarString($onlineOnly);
        $filename = $onlineOnly ? 'laracon-us-2026-online.ics' : 'laracon-us-2026.ics';

        return response($calendar)
            ->header('Content-Type', 'text/calendar; charset=utf-8')
            ->header('Content-Disposition', "attachment; filename=\"{$filename}\"");
    }
}
