<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventCategoryRequest;
use Illuminate\Http\Request;
use App\Repositories\Event\Contracts\EventCategoryRepositoryInterface;

use App\Http\Resources\Event\EventCategoryResource;
//jwt
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\Events\EventCategory;


class EventCategoryController extends Controller
{
    private $eventCategoryRepository;

    public function __construct(EventCategoryRepositoryInterface $eventCategoryRepository)
    {
        $this->eventCategoryRepository = $eventCategoryRepository;
    }

    public function index()
    {
        return response()->json(EventCategoryResource::collection($this->eventCategoryRepository->all()), 200);
    }

    public function store(EventCategoryRequest $request)
    {
        try {
            $data = $request->all();
            $data['created_by'] = auth()->user()->id;
            $user  = JWTAuth::parseToken()->authenticate();

            $this->authorize('create', EventCategory::class);
            $eventCategory = $this->eventCategoryRepository->create($data, $user->id);
            return response()->json(new EventCategoryResource($eventCategory), 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }
}
