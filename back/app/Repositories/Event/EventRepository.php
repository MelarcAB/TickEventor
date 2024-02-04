<?php

namespace App\Repositories\Event;

use App\Models\Event;

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
        return Event::create($data);
    }

    public function update(array $data, $id)
    {
        return Event::find($id)->update($data);
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
}