<?php


namespace App\Repositories\Notification\Contracts;

interface NotificationInterface
{

    public function send($reicipient, $subject, $view, $data);
}