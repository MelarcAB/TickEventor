<?php

namespace App\Repositories\Event;


use App\Helpers\SlugService;

use App\Repositories\Event\Contracts\EventFollowRepositoryInterface;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use App\Models\User;


//usar eventrepositoryinterface
use App\Repositories\Event\Contracts\EventRepositoryInterface;
use App\Repositories\Event\EventRepository;

//user repository
use App\Repositories\User\Contracts\UserRepositoryInterface;
use App\Repositories\User\UserRepository;
use Auth;

class EventFollowRepository implements EventFollowRepositoryInterface
{
    private $eventRepository;
    
    private $userRepository;

    public function __construct(EventRepositoryInterface $eventRepository, UserRepositoryInterface $userRepository)
    {
        $this->eventRepository = $eventRepository;
        $this->userRepository = $userRepository;
    }

    public function followEvent($userId, $eventSlug)
    {
        $event = $this->eventRepository->findEventBySlug($eventSlug);

        // Verifica si el evento existe
        $user = $this->userRepository->find($userId);

        // Verifica si el evento pertenece al usuario
        if ($event->created_by == $userId) {
            throw new \Exception("You cannot follow your own event.");
        }
        // Verifica si el usuario ya sigue el evento
        $alreadyFollowing = $user->following()->where('event_id', $event->id)->exists();
        if ($alreadyFollowing) {
            throw new \Exception("You are already following this event.");
        }

        $user->following()->attach($event->id);
    }

    public function unfollowEvent($userId, $eventSlug)
    {
        try {
            $event =    $this->eventRepository->findEventBySlug($eventSlug);
            $user =     $this->userRepository->find($userId);

            // Verifica si el usuario ha creado el evento
            if ($event->created_by == $userId) {
                throw new \Exception("You cannot unfollow your own event.");
            }



            // Verifica si el usuario ya sigue el evento
            $alreadyFollowing = $user->following()->where('event_id', $event->id)->exists();
            if (!$alreadyFollowing) {
                throw new \Exception("You are not following this event.");
            }

            $user->following()->detach($event->id);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }


}