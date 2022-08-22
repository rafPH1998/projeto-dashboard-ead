<?php

namespace App\Repositories;


interface LessonRepositoryInterface
{

    public function getAllByModule(string $moduleId, string $filter = ''): array;
    public function findById(string $id): object|null;
    public function update(string $id, array $data): object|null;
    public function delete(string $id): bool;
}