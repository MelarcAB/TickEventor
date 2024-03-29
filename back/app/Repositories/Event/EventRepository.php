<?php

namespace App\Repositories\Event;

use App\Models\Event;

use App\Helpers\SlugService;

use App\Repositories\Event\Contracts\EventRepositoryInterface;

class EventRepository implements EventRepositoryInterface
{
    public function all()
    {
        return Event::all();
    }

    public function create(array $data,$userId)
    {
        $data['created_by'] = $userId;
        $data['updated_by'] = $userId;

        //generate slug
        $data['slug'] = SlugService::createSlug(Event::class, $data['name']);

        return Event::create($data);
    }

    public function update(array $data, $slug)
    {
        $event = $this->findEventBySlug($slug);
        //quitar slug del array
        unset($data['slug']);
        $event->update($data);
        return $event;
    }

    public function delete($id, $userId)
    {
        //soft delete
        $event = $this->find($id);
        $event->deleted_by = $userId;
        $event->save();
        $event->delete();
    }

    public function find($id)
    {
        return Event::find($id);
    }

    public function findEventByName($name)
    {
        return Event::where('name', $name)->first();
    }

    public function findEventBySlug($slug)
    {
        return Event::where('slug', $slug)->first();
    }



}