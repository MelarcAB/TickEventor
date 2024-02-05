<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Event\Contracts\EventCategoryRepositoryInterface;

use App\Http\Resources\Event\EventCategoryResource;


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
}
