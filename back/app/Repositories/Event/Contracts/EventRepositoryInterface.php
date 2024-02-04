<?php


namespace App\Repositories\Event\Contracts;

interface EventRepositoryInterface
{
    public function all();

    public function create(array $data,$userId);

    public function update(array $data, $id);

    public function delete($id);

    public function find($id);

    public function findEventByName($name);
}