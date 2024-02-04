<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Event\Contracts\EventRepositoryInterface;
use App\Http\Resources\Event\EventResource;
use App\Http\Requests\Event\EventRequest;

//jwt
use Tymon\JWTAuth\Facades\JWTAuth;


class EventController extends Controller
{
    

    private $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function index()
    {
        $events = $this->eventRepository->all();
        return EventResource::collection($events);
    }

    public function store(EventRequest $request)
    {

        //get current user from jwt
        $user = JWTAuth::parseToken()->authenticate();


        $event = $this->eventRepository->create($request->all(), $user->id);
        return $event;
       // return new EventResource($event);
    }
}
