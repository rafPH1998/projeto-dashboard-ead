<?php

namespace App\Repositories;

use App\Repositories\Presenters\PaginationPresenter;

interface CourseRepositoryInterface
{

    public function getAll(string $filter = ''): PaginationPresenter;
    public function findById(string $id): object|null;
    public function update(string $id, array $data): object|null;
    public function delete(string $id): bool;
}