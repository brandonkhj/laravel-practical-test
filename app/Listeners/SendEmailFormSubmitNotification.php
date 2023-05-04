<?php

namespace App\Listeners;

use App\Events\FormSubmitted;
use App\Mail\FormSubmit;
use Illuminate\Support\Facades\Mail;

class SendEmailFormSubmitNotification
{
    public function handle(FormSubmitted $event): void
    {
        Mail::to(config('mail.from.address'))
            ->send(new FormSubmit($event->form));
    }
}
