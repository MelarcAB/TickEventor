<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Event\Contracts\EventRepositoryInterface;
use App\Http\Resources\Event\EventResource;
use App\Http\Requests\Event\EventRequest;
use App\Http\Requests\Event\EventUpdateRequest;

//jwt
use Tymon\JWTAuth\Facades\JWTAuth;


class EventController extends Controller
{


    /**esto es lo mismo que
     * private $eventRepository;
     * public function __construct(EventRepositoryInterface $eventRepository)
     * {
     * $this->eventRepository = $eventRepository;
     * }
     */
    public function __construct(private EventRepositoryInterface $eventRepository)
    {
    }


    public function index()
    {
        $events = $this->eventRepository->all();
        if (!$events) {
            return response()->json([
                'message' => 'No events found'
            ], 404);
        }
        return EventResource::collection($events);
    }

    public function store(EventRequest $request)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            $event = $this->eventRepository->create($request->all(), $user->id);
            return new EventResource($event);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function show($slug)
    {
        try {
            $event = $this->eventRepository->findEventBySlug($slug);
            if (!$event) {
                return response()->json([
                    'message' => 'Event not found'
                ], 404);
            }
            return new EventResource($event);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(EventUpdateRequest $request, $slug)
    {
        try {
            $data = $request->validated();
            $event = $this->eventRepository->findEventBySlug($slug);

            if (!$event) {
                return response()->json([
                    'message' => 'Event not found'
                ], 404);
            }
            $this->authorize('update', $event);

            $eventUpdate = $this->eventRepository->update($data, $event->slug);
            return new EventResource($eventUpdate);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            return response()->json([
                'message' => 'Unauthorized',
                'error' => $e->getMessage()
            ], 403);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function destroy($slug)
    {
        try {
            $event = $this->eventRepository->findEventBySlug($slug);
            if (!$event) {
                return response()->json([
                    'message' => 'Event not found'
                ], 404);
            }
            $this->authorize('delete', $event);
            $user = JWTAuth::parseToken()->authenticate();
            $this->eventRepository->delete($event->id, $user->id);
            return response()->json([
                'message' => 'Event deleted'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error',
                'error' => $e->getMessage()
            ], 500);
        }
    }



}
