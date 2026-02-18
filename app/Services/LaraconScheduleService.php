<?php

namespace App\Services;

use DateTimeImmutable;
use DateTimeZone;
use Spatie\IcalendarGenerator\Components\Calendar;
use Spatie\IcalendarGenerator\Components\Event;

class LaraconScheduleService
{
    private const TIMEZONE = 'Europe/Amsterdam';

    private const MAIN_VENUE = 'Passenger Terminal Amsterdam, Piet Heinkade 27, 1019 BR Amsterdam, Netherlands';

    private const AFTER_DARK_VENUE = 'Lowlander Botanical Bar, Gedempt Hamerkanaal 201, 1021 KP Amsterdam, Netherlands';

    /**
     * @return array<int, array{date: string, title: string, speaker: string|null, start: string, end: string, venue: string}>
     */
    public function getSchedule(): array
    {
        return [
            // Day 1 - March 2, 2026
            ['date' => '2026-03-02', 'title' => 'Registration', 'speaker' => null, 'start' => '08:30', 'end' => '09:15', 'venue' => 'main'],
            ['date' => '2026-03-02', 'title' => 'LARACON_INIT', 'speaker' => 'Nuno Maduro', 'start' => '09:15', 'end' => '09:30', 'venue' => 'main'],
            ['date' => '2026-03-02', 'title' => 'Write better abstractions: lessons from an import system', 'speaker' => 'Dan Harrin', 'start' => '09:30', 'end' => '10:00', 'venue' => 'main'],
            ['date' => '2026-03-02', 'title' => 'Handling the unhappy path', 'speaker' => 'Ryan Chandler', 'start' => '10:00', 'end' => '10:30', 'venue' => 'main'],
            ['date' => '2026-03-02', 'title' => 'Break', 'speaker' => null, 'start' => '10:30', 'end' => '11:00', 'venue' => 'main'],
            ['date' => '2026-03-02', 'title' => 'Things you didn\'t know you could do in CSS', 'speaker' => 'Leah Thompson', 'start' => '11:00', 'end' => '11:30', 'venue' => 'main'],
            ['date' => '2026-03-02', 'title' => 'One billion rows with Laravel', 'speaker' => 'Tobias Petry', 'start' => '11:30', 'end' => '12:00', 'venue' => 'main'],
            ['date' => '2026-03-02', 'title' => 'Unblocking your users with AI', 'speaker' => 'Peter Suhm', 'start' => '12:00', 'end' => '12:30', 'venue' => 'main'],
            ['date' => '2026-03-02', 'title' => 'Lunch', 'speaker' => null, 'start' => '12:30', 'end' => '14:00', 'venue' => 'main'],
            ['date' => '2026-03-02', 'title' => 'Against all odds: NativePHP for mobile one year later', 'speaker' => 'Simon Hamp', 'start' => '14:00', 'end' => '14:30', 'venue' => 'main'],
            ['date' => '2026-03-02', 'title' => 'Composer Deep Dive', 'speaker' => 'Nils Adermann', 'start' => '14:30', 'end' => '15:00', 'venue' => 'main'],
            ['date' => '2026-03-02', 'title' => 'Effective Code Reviews: What NOT to Do', 'speaker' => 'Luke Kuzmish', 'start' => '15:00', 'end' => '15:30', 'venue' => 'main'],
            ['date' => '2026-03-02', 'title' => 'Break', 'speaker' => null, 'start' => '15:30', 'end' => '16:00', 'venue' => 'main'],
            ['date' => '2026-03-02', 'title' => 'AI won\'t fail loudly — It\'ll fail quietly', 'speaker' => 'Yannick Kupferschmidt', 'start' => '16:00', 'end' => '16:30', 'venue' => 'main'],
            ['date' => '2026-03-02', 'title' => 'Laravel Update', 'speaker' => 'Taylor Otwell', 'start' => '16:30', 'end' => '17:30', 'venue' => 'main'],
            ['date' => '2026-03-02', 'title' => 'Social Drinks', 'speaker' => null, 'start' => '17:30', 'end' => '18:30', 'venue' => 'main'],
            ['date' => '2026-03-02', 'title' => 'After Dark Party', 'speaker' => null, 'start' => '21:00', 'end' => '00:00', 'venue' => 'after_dark'],

            // Day 2 - March 3, 2026
            ['date' => '2026-03-03', 'title' => 'Welcoming', 'speaker' => null, 'start' => '08:30', 'end' => '09:15', 'venue' => 'main'],
            ['date' => '2026-03-03', 'title' => 'LARACON_INIT', 'speaker' => 'Nuno Maduro', 'start' => '09:15', 'end' => '09:30', 'venue' => 'main'],
            ['date' => '2026-03-03', 'title' => 'State of the Frontend', 'speaker' => 'Joe Tannenbaum', 'start' => '09:30', 'end' => '10:00', 'venue' => 'main'],
            ['date' => '2026-03-03', 'title' => 'Building applications like Puzzles', 'speaker' => 'Wendell Adriel', 'start' => '10:00', 'end' => '10:30', 'venue' => 'main'],
            ['date' => '2026-03-03', 'title' => 'Break', 'speaker' => null, 'start' => '10:30', 'end' => '11:00', 'venue' => 'main'],
            ['date' => '2026-03-03', 'title' => 'Butterfly effect: orchestrating freedom with AI', 'speaker' => 'Nina Karisik', 'start' => '11:00', 'end' => '11:30', 'venue' => 'main'],
            ['date' => '2026-03-03', 'title' => 'How real-world UX helps your projects thrive', 'speaker' => 'Pete Heslop', 'start' => '11:30', 'end' => '12:00', 'venue' => 'main'],
            ['date' => '2026-03-03', 'title' => 'Ship to Production on DAY 1', 'speaker' => 'John Drexler', 'start' => '12:00', 'end' => '12:30', 'venue' => 'main'],
            ['date' => '2026-03-03', 'title' => 'Lunch', 'speaker' => null, 'start' => '12:30', 'end' => '14:00', 'venue' => 'main'],
            ['date' => '2026-03-03', 'title' => 'This shouldn\'t work', 'speaker' => 'Shane Rosenthal', 'start' => '14:00', 'end' => '14:30', 'venue' => 'main'],
            ['date' => '2026-03-03', 'title' => 'Imports, a war story', 'speaker' => 'Daniel Coulbourne', 'start' => '14:30', 'end' => '15:00', 'venue' => 'main'],
            ['date' => '2026-03-03', 'title' => 'Refactoring to Parallel', 'speaker' => 'Marcel Pociot', 'start' => '15:00', 'end' => '15:30', 'venue' => 'main'],
            ['date' => '2026-03-03', 'title' => 'Break', 'speaker' => null, 'start' => '15:30', 'end' => '16:00', 'venue' => 'main'],
            ['date' => '2026-03-03', 'title' => 'Laravel Panel', 'speaker' => null, 'start' => '16:00', 'end' => '17:15', 'venue' => 'main'],
            ['date' => '2026-03-03', 'title' => 'Social Drinks', 'speaker' => null, 'start' => '17:30', 'end' => '18:30', 'venue' => 'main'],
        ];
    }

    public function generateCalendar(): Calendar
    {
        $calendar = Calendar::create('Laracon EU 2026')
            ->productIdentifier('-//Laracon EU//Schedule//EN');

        $timezone = new DateTimeZone(self::TIMEZONE);

        foreach ($this->getSchedule() as $item) {
            $eventName = $item['speaker']
                ? "{$item['title']} - {$item['speaker']}"
                : $item['title'];

            $venue = $item['venue'] === 'after_dark'
                ? self::AFTER_DARK_VENUE
                : self::MAIN_VENUE;

            $startsAt = new DateTimeImmutable("{$item['date']} {$item['start']}", $timezone);

            $endDate = $item['date'];
            if ($item['end'] === '00:00') {
                $endDate = (new DateTimeImmutable($item['date']))->modify('+1 day')->format('Y-m-d');
            }
            $endsAt = new DateTimeImmutable("{$endDate} {$item['end']}", $timezone);

            $event = Event::create($eventName)
                ->startsAt($startsAt)
                ->endsAt($endsAt)
                ->address($venue);

            $calendar->event($event);
        }

        return $calendar;
    }

    public function getCalendarString(): string
    {
        return $this->generateCalendar()->get();
    }
}
