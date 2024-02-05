<?php


namespace App\Repositories\Event\Contracts;

interface EventCategoryRepositoryInterface
{
    public function all();

    public function create(array $data,$userId);

    public function update(array $data, $slug, $userId);

    public function delete($id);

    public function find($id);

    public function findByName($name);
}