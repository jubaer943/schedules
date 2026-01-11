<?php

namespace App\Services;

use Spatie\GoogleCalendar\Event;
use Carbon\Carbon;

class GoogleMeetService
{
    /**
     * Creates a Google Calendar event and returns the Meet link.
     */
public function createMeeting(array $details): array
{
    // 1. Initialize the Spatie Event as usual
    $event = new \Spatie\GoogleCalendar\Event;
    $event->name = $details['title'];
    $event->startDateTime = \Carbon\Carbon::parse($details['start_time']);
    $event->endDateTime = \Carbon\Carbon::parse($details['end_time']);

    // 2. Get the underlying Google Service and Calendar ID from the package
    $calendarService = $event->getGoogleCalendarService();
    $calendarId = config('google-calendar.calendar_id');

    // 3. Manually construct the Google SDK Event object
    $googleEvent = new \Google_Service_Calendar_Event([
        'summary' => $event->name,
        'start'   => ['dateTime' => $event->startDateTime->toRfc3339String()],
        'end'     => ['dateTime' => $event->endDateTime->toRfc3339String()],
        'conferenceData' => [
            'createRequest' => [
                'requestId' => 'meet-' . uniqid(),
                'conferenceSolutionKey' => ['type' => 'hangoutsMeet'],
            ],
        ],
    ]);

    // 4. Call the API directly with conferenceDataVersion=1 explicitly
    $createdEvent = $calendarService->events->insert($calendarId, $googleEvent, [
        'conferenceDataVersion' => 1
    ]);

    return [
        'meet_link' => $createdEvent->hangoutLink,
        'event_id'  => $createdEvent->id,
    ];
}
}