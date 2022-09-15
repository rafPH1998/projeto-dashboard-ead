<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Presenters\PaginationPresenter;
use App\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{

    public function __construct(protected User $model)
    {

    }

    public function getAll(string $filter = ''): PaginationPresenter
    {
        $users = $this->model
                        ->where(function ($query) use ($filter) {
                            if ($filter) {
                                $query->where('email', $filter);
                                $query->Orwhere('name', 'LIKE', "%{$filter}%");
                            }
                        })->paginate(5);

        return new PaginationPresenter($users);
    }

    public function findById(string $id): object|null
    {
        return $this->model->find($id);
    }

    public function create(array $data): object
    {
        return $this->model->create($data);
    }

    public function update(string $id, array $data): object|null
    {
        $user = $this->findById($id);

        if (!$user) {
            return null;
        }

        $user->update($data);

        return $user;
    }

    public function delete(string $id): bool
    {
        $user = $this->findById($id);

        if (!$user) {
            return false;
        }

        return $user->delete();
    }
    
}

