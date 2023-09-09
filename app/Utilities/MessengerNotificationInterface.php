<?php

namespace App\Utilities;

interface MessengerNotificationInterface
{
    public function send($message): bool;
}
