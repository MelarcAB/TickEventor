<?php
namespace App\Repositories\User\Contracts;

interface UserRepositoryInterface
{
    public function all();

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function find($id);



    //Auth
    public function register(array $data);
    public function findUserByEmail($email);



}
