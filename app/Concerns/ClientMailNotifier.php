<?php

namespace App\Concerns;

use App\Mail\ClientCreatedMail;
use Illuminate\Support\Facades\Mail;

trait ClientMailNotifier
{
    public function notifyClient(string $client_email)
    {
        Mail::to($client_email)
            ->send(new ClientCreatedMail);
    }
}
