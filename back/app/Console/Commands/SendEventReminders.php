<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Services\EventNotificationService;

class SendEventReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-event-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminders for events happening in two days.';

    
    public function __construct(EventNotificationService $eventNotificationService)
    {
        parent::__construct();
        $this->eventNotificationService = $eventNotificationService;
    }
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->eventNotificationService->sendEventReminders();
        $this->info('Los correos electrónicos de recordatorio han sido enviados.');

    }
}
