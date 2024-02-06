<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Event\Contracts\EventFollowRepositoryInterface;

class FollowController extends Controller
{
    protected $eventFollowRepository;

    public function __construct(EventFollowRepositoryInterface $eventFollowRepository)
    {
        $this->eventFollowRepository = $eventFollowRepository;
    }


    public function followEvent(Request $request)
    {
        try {
            //validar que tenga el campo slug
            $request->validate([
                'slug' => 'required|string|exists:events,slug'
            ]);
            $userId = $request->user()->id;
            $eventSlug = $request->slug;

            $this->eventFollowRepository->followEvent($userId, $eventSlug);

            return response()->json(['message' => 'Event followed successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }

    }


    public function unfollowEvent(Request $request)
    {
        try {

            $request->validate([
                'slug' => 'required|string|exists:events,slug'
            ]);
            $userId = $request->user()->id;
            $eventId =  $request->slug;

            $this->eventFollowRepository->unfollowEvent($userId, $eventId);

            return response()->json(['message' => 'Event unfollowed successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }

    }
}
