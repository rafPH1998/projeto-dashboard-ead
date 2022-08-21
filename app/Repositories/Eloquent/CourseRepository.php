<?php

namespace App\Repositories\Eloquent;

use App\Models\Course;
use App\Repositories\CourseRepositoryInterface;

class CourseRepository implements CourseRepositoryInterface
{

    public function __construct(protected Course $course)
    {

    }


    public function getAll(string $filter = ''): array
    {
        $courses = $this->course
                        ->where(function ($query) use ($filter) {
                            if ($filter) {
                                $query->Orwhere('name', 'LIKE', "%{$filter}%");
                            }
                        })->get();

        return $courses->toArray();
    }

    public function findById(string $id): object|null
    {
        return $this->course->find($id);
    }

    public function create(array $data): object
    {
        return $this->course->create($data);
    }

    public function update(string $id, array $data): object|null
    {

        $course = $this->findById($id);

        if (!$course) {
            return null;
        }

        $course->update($data);

        return $course;
    }

    public function delete(string $id): bool
    {

    }

}
