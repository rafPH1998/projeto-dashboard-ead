<?php

namespace App\Repositories\Eloquent;

use App\Models\Module;
use App\Repositories\ModuleRepositoryInterface;

class ModuleRepository implements ModuleRepositoryInterface
{

    public function __construct(protected Module $modules)
    {

    }

    public function getAllByCourse(string $courseId, string $filter = ''): array
    {
        $modules = $this->modules
                        ->where(function ($query) use ($filter) {
                            if ($filter) {
                                $query->where('email', $filter);
                                $query->Orwhere('name', 'LIKE', "%{$filter}%");
                            }
                        })
                        ->where('course_id', $courseId)
                        ->get();

        return $modules->toArray();
    }

    public function findById(string $id): object|null
    {
        return $this->modules->find($id);
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

