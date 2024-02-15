<?php

namespace App\Services;

use App\Repositories\Notification\Contracts\NotificationInterface;
use App\Models\Event; // Asumiendo que tienes un modelo Event

class EventNotificationService
{
    protected $notificationService;

    public function __construct(NotificationInterface $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function sendEventReminders()
    {
        $events = Event::with('users') 
            ->whereDate('start_date', '=', now()->addDays(2))
            ->get();

            print $events;

        foreach ($events as $event) {
            foreach ($event->users as $follower) {
                $subject = "Recordatorio de evento: {$event->name}";
                $view = 'mail.reminder'; 
                $data = ['event' => $event];
                $this->notificationService->send($follower->email, $subject, $view, $data);
            }
        }
    }
}
