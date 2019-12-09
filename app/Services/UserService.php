<?php

namespace App\Services;

use App\Entities\User;
use App\Repositories\UsersRepository;
use App\Services\Contracts\UserServiceContract;

class UserService implements UserServiceContract
{
    protected $user;

    public function __construct(UsersRepository $user)
    {
        $this->user = $user;
    }

    public function all($columns = ['*'])
    {
        return $this->user->all();
    }

    public function find($id, $columns = ['*'])
    {
        return $this->user->find($id);
    }

    public function create(array $attributes)
    {
        return $this->user->create($attributes);
    }

    public function update(array $attributes, $id)
    {
        return $this->user->find($id)->update($attributes);
    }

    public function delete($id)
    {
        return $this->user->find($id);
    }
}
