<?php


namespace App\Repositories\Event\Contracts;

interface EventRepositoryInterface
{
    public function all();

    public function create(array $data,$userId);

    public function update(array $data, $slug);

    public function delete($id, $userId);

    public function find($id);

    public function findEventByName($name);

    //findEventBySlug
    public function findEventBySlug($slug);
}