<?php

namespace App\Repositories\Eloquent;

use App\Models\Lesson;
use App\Repositories\LessonRepositoryInterface;

class LessonRepository implements LessonRepositoryInterface
{

    public function __construct(
        protected Lesson $lesson
    ){}


    public function getAllByModule(string $moduleId, string $filter = ''): array
    {
        $lessons = $this->lesson
                        ->where(function ($query) use ($filter) {
                            if ($filter) {
                                $query->Orwhere('name', 'LIKE', "%{$filter}%");
                            }
                        })
                        ->where('module_id', $moduleId)
                        ->get();

        return $lessons->toArray();
    }

    public function findById(string $id): object|null
    {
        return $this->lesson->find($id);
    }

    public function update(string $id, array $data): object|null
    {

        $lesson = $this->findById($id);

        if (!$lesson) {
            return null;
        }

        $lesson->update($data);

        return $lesson;
    }

    public function delete(string $id): bool
    {
        $lesson = $this->findById($id);

        if (!$lesson) {
            return false;
        }

        return $lesson->delete();
    }

}
