<?php

namespace App\Services;

use DateTimeImmutable;
use DateTimeZone;
use Spatie\IcalendarGenerator\Components\Calendar;
use Spatie\IcalendarGenerator\Components\Event;

class LaraconScheduleService
{
    private const TIMEZONE = 'America/New_York';

    private const MAIN_VENUE = 'SoWa Power Station, 550 Harrison Ave, Boston, MA 02118, United States';

    private const DODGEBALL_VENUE = 'Cathedral High School, 74 Union Park, Boston, MA 02118, United States';

    private const LARABELLES_VENUE = 'Boston, MA (venue TBA)';

    private const LARAPROM_VENUE = 'Cathedral High School, 74 Union Park, Boston, MA 02118, United States';

    /**
     * @return array<int, array{date: string, title: string, speaker: string|null, start: string, end: string, venue: string}>
     */
    public function getSchedule(): array
    {
        return [
            // Day 0 - July 27, 2026
            ['date' => '2026-07-27', 'title' => 'Dodgeball', 'speaker' => null, 'start' => '15:00', 'end' => '17:00', 'venue' => 'dodgeball'],
            ['date' => '2026-07-27', 'title' => 'Larabelles Meetup', 'speaker' => null, 'start' => '16:00', 'end' => '18:00', 'venue' => 'larabelles'],
            ['date' => '2026-07-27', 'title' => 'Laraprom with Mostly Technical', 'speaker' => null, 'start' => '20:00', 'end' => '22:00', 'venue' => 'laraprom'],

            // Day 1 - July 28, 2026
            ['date' => '2026-07-28', 'title' => 'Opening', 'speaker' => 'Aaron Francis', 'start' => '09:30', 'end' => '09:40', 'venue' => 'main'],
            ['date' => '2026-07-28', 'title' => 'Pest 5', 'speaker' => 'Nuno Maduro', 'start' => '09:40', 'end' => '10:05', 'venue' => 'main'],
            ['date' => '2026-07-28', 'title' => 'From Vibe Coding to Vibe Engineering', 'speaker' => 'Kitze', 'start' => '10:05', 'end' => '10:30', 'venue' => 'main'],
            ['date' => '2026-07-28', 'title' => 'Cleverness Is A Loan', 'speaker' => 'Mary Perry', 'start' => '10:30', 'end' => '10:55', 'venue' => 'main'],
            ['date' => '2026-07-28', 'title' => 'Morning Break', 'speaker' => null, 'start' => '10:55', 'end' => '11:25', 'venue' => 'main'],
            ['date' => '2026-07-28', 'title' => 'The Desired State', 'speaker' => 'Chris Fidao', 'start' => '11:25', 'end' => '11:50', 'venue' => 'main'],
            ['date' => '2026-07-28', 'title' => 'Building Software at the Edge of Your Understanding', 'speaker' => 'Matt Stauffer', 'start' => '11:50', 'end' => '12:15', 'venue' => 'main'],
            ['date' => '2026-07-28', 'title' => 'Lunch', 'speaker' => null, 'start' => '12:15', 'end' => '13:45', 'venue' => 'main'],
            ['date' => '2026-07-28', 'title' => 'Proven Package Patterns', 'speaker' => 'Freek Van Der Herten', 'start' => '13:45', 'end' => '14:10', 'venue' => 'main'],
            ['date' => '2026-07-28', 'title' => 'Building Realtime Collaborative Apps with Laravel', 'speaker' => 'Joe Tannenbaum', 'start' => '14:10', 'end' => '14:35', 'venue' => 'main'],
            ['date' => '2026-07-28', 'title' => 'Afternoon Break', 'speaker' => null, 'start' => '14:35', 'end' => '15:05', 'venue' => 'main'],
            ['date' => '2026-07-28', 'title' => 'Upload to Playback: Building a Video Processing Pipeline', 'speaker' => 'Joshua Alphonse', 'start' => '15:05', 'end' => '15:30', 'venue' => 'main'],
            ['date' => '2026-07-28', 'title' => 'Whimsy-Driven Development', 'speaker' => 'Christina Martinez', 'start' => '15:30', 'end' => '16:00', 'venue' => 'main'],
            ['date' => '2026-07-28', 'title' => 'Laravel Updates', 'speaker' => 'Taylor Otwell', 'start' => '16:00', 'end' => '17:00', 'venue' => 'main'],

            // Day 2 - July 29, 2026
            ['date' => '2026-07-29', 'title' => 'Opening', 'speaker' => 'Aaron Francis', 'start' => '09:30', 'end' => '09:35', 'venue' => 'main'],
            ['date' => '2026-07-29', 'title' => 'The Last Software Engineer', 'speaker' => 'Kent C. Dodds', 'start' => '09:35', 'end' => '10:00', 'venue' => 'main'],
            ['date' => '2026-07-29', 'title' => 'Building a CLI Coding Agent from Scratch', 'speaker' => 'Mateus Guimarães', 'start' => '10:00', 'end' => '10:25', 'venue' => 'main'],
            ['date' => '2026-07-29', 'title' => 'Git, But Better: an introduction to JJ', 'speaker' => 'Pauline Vos', 'start' => '10:25', 'end' => '10:50', 'venue' => 'main'],
            ['date' => '2026-07-29', 'title' => 'Morning Break', 'speaker' => null, 'start' => '10:50', 'end' => '11:25', 'venue' => 'main'],
            ['date' => '2026-07-29', 'title' => 'Filament: Advanced Practical Examples', 'speaker' => 'Povilas Korop', 'start' => '11:25', 'end' => '11:50', 'venue' => 'main'],
            ['date' => '2026-07-29', 'title' => 'Building for Agents & Humans', 'speaker' => 'Gordon Diggs', 'start' => '11:50', 'end' => '12:15', 'venue' => 'main'],
            ['date' => '2026-07-29', 'title' => 'Lunch', 'speaker' => null, 'start' => '12:15', 'end' => '13:45', 'venue' => 'main'],
            ['date' => '2026-07-29', 'title' => 'Think Harder: How I Prompt', 'speaker' => 'Thorsten Ball', 'start' => '13:45', 'end' => '14:10', 'venue' => 'main'],
            ['date' => '2026-07-29', 'title' => 'AI Can Do Your Job… What Now?', 'speaker' => 'Will King', 'start' => '14:10', 'end' => '14:35', 'venue' => 'main'],
            ['date' => '2026-07-29', 'title' => 'Afternoon Break', 'speaker' => null, 'start' => '14:35', 'end' => '15:00', 'venue' => 'main'],
            ['date' => '2026-07-29', 'title' => 'Laravel Community Update', 'speaker' => null, 'start' => '15:00', 'end' => '15:15', 'venue' => 'main'],
            ['date' => '2026-07-29', 'title' => 'Scaling Laravel', 'speaker' => 'Devon Garbalosa', 'start' => '15:15', 'end' => '15:40', 'venue' => 'main'],
            ['date' => '2026-07-29', 'title' => 'Closing Panel', 'speaker' => null, 'start' => '15:40', 'end' => '17:00', 'venue' => 'main'],
        ];
    }

    public function generateCalendar(): Calendar
    {
        $calendar = Calendar::create('Laracon US 2026')
            ->productIdentifier('-//Laracon US//Schedule//EN');

        $timezone = new DateTimeZone(self::TIMEZONE);

        foreach ($this->getSchedule() as $item) {
            $eventName = $item['speaker']
                ? "{$item['title']} - {$item['speaker']}"
                : $item['title'];

            $venue = match ($item['venue']) {
                'dodgeball' => self::DODGEBALL_VENUE,
                'larabelles' => self::LARABELLES_VENUE,
                'laraprom' => self::LARAPROM_VENUE,
                default => self::MAIN_VENUE,
            };

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
