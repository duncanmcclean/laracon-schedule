<?php

namespace Tests\Feature;

use Tests\TestCase;

class CalendarScheduleTest extends TestCase
{
    public function test_calendar_ics_includes_in_person_only_events_by_default(): void
    {
        $response = $this->get(route('calendar.ics'));

        $response->assertOk();
        $response->assertSee('SUMMARY:Lunch', false);
        $response->assertSee('SUMMARY:Dodgeball', false);
    }

    public function test_calendar_ics_excludes_in_person_only_events_when_watching_online(): void
    {
        $response = $this->get(route('calendar.ics', ['online' => 1]));

        $response->assertOk();
        $response->assertDontSee('SUMMARY:Lunch', false);
        $response->assertDontSee('SUMMARY:Dodgeball', false);
        $response->assertDontSee('SUMMARY:Larabelles Meetup', false);
        $response->assertDontSee('SUMMARY:Laraprom with Mostly Technical', false);
        $response->assertSee('SUMMARY:Opening', false);
    }

    public function test_calendar_download_includes_in_person_only_events_by_default(): void
    {
        $response = $this->get(route('calendar.download'));

        $response->assertOk();
        $response->assertHeader('Content-Disposition', 'attachment; filename="laracon-us-2026.ics"');
        $response->assertSee('SUMMARY:Lunch', false);
    }

    public function test_calendar_download_excludes_in_person_only_events_when_watching_online(): void
    {
        $response = $this->get(route('calendar.download', ['online' => 1]));

        $response->assertOk();
        $response->assertHeader('Content-Disposition', 'attachment; filename="laracon-us-2026-online.ics"');
        $response->assertDontSee('SUMMARY:Lunch', false);
    }
}
