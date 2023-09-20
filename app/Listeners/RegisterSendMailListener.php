<?php

namespace App\Listeners;

use App\Events\RegisterSendMailEvent;
use App\Mail\OtpMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RegisterSendMailListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    use InteractsWithQueue;

    public function __construct()
    {
        //
    }
    /**
     * Handle the event.
     */
    public function handle(RegisterSendMailEvent $event): void
    {
        try {
            // Attempt to send the email
            Mail::to($event->data['email'])->send(new OtpMail($event->data));
        } catch (\Exception $e) {
            // Handle the exception gracefully
        }
        return;
    }
}
