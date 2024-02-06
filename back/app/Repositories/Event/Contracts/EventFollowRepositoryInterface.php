<?php


namespace App\Repositories\Event\Contracts;

interface EventFollowRepositoryInterface
{
    public function followEvent($userId, $eventSlug);
    public function unfollowEvent($userId, $eventSlug);

}