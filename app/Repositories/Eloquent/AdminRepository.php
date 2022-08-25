<?php

namespace App\Repositories\Eloquent;

use App\Models\Admin;
use App\Repositories\AdminRepositoryInterface;

class AdminRepository implements AdminRepositoryInterface
{

    public function __construct(protected Admin $admin)
    {

    }

    public function getAll(string $filter = ''): array
    {
        $admins = $this->admin
                        ->where(function ($query) use ($filter) {
                            if ($filter) {
                                $query->where('email', $filter);
                                $query->Orwhere('name', 'LIKE', "%{$filter}%");
                            }
                        })->get();

        return $admins->toArray();
    }

    public function findById(string $id): object|null
    {
        return $this->admin->find($id);
    }

    public function create(array $data): object
    {
        return $this->admin->create($data);
    }

    public function update(string $id, array $data): object|null
    {
        $admins = $this->findById($id);

        if (!$admins) {
            return null;
        }

        $admins->update($data);

        return $admins;
    }

    public function delete(string $id): bool
    {
        $admins = $this->findById($id);

        if (!$admins) {
            return false;
        }

        return $admins->delete();
    }
    
}

