<?php

namespace App\Repositories;

use App\Repositories\Presenters\PaginationPresenter;

interface SupportRepositoryInterface
{

    public function getSupports(string $status = 'pendente', int $page): PaginationPresenter;
    public function search(array $filter = []): array;
    public function findByIdSupport(string $id): object|null;
}