<?php

namespace App\Repositories\Eloquent;

use App\Models\Course;
use App\Repositories\CourseRepositoryInterface;
use App\Repositories\Presenters\PaginationPresenter;

class CourseRepository implements CourseRepositoryInterface
{

    public function __construct(
        protected Course $course
    ){}


    public function getAll(string $filter = ''): PaginationPresenter
    {
        $courses = $this->course
                        ->where(function ($query) use ($filter) {
                            if ($filter) {
                                $query->Orwhere('name', 'LIKE', "%{$filter}%");
                            }
                        })
                        ->whereDate('created_at', '>=', now()->subDays(4))     
                        ->whereDate('created_at', '<=', now()->subDays(1))        
                        ->orderBy('id', 'DESC')
                        ->paginate(3);

        return new PaginationPresenter($courses);
    }

    public function findById(string $id): object|null
    {
        return $this->course->find($id);
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
        $course = $this->findById($id);

        if (!$course) {
            return false;
        }

        return $course->delete();
    }

}
