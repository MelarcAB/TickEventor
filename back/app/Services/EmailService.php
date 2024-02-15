<?php
namespace App\Services;

use App\Repositories\Notification\Contracts\NotificationInterface;
use App\Repositories\User\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;



class EmailService implements NotificationInterface
{
    public function send($recipient, $subject, $view, $data)
    {
        Mail::send($view, $data, function ($message) use ($recipient, $subject) {
            $message->to($recipient)->subject($subject);
        });
    }




}
