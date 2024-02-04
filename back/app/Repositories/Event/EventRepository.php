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

    public function delete($id)
    {
        return Event::find($id)->delete();
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

    //generate slug
    public function generateSlug($name)
    {
        $slug = str_slug($name, '-');
        $count = 2;
        while (Event::where('slug', $slug)->first()) {
            $slug = $slug . '-' . $count;
            $count++;
        }
        return $slug;
    }
}