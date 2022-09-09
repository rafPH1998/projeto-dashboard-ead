<?php

namespace App\Repositories;

use App\Repositories\Presenters\PaginationPresenter;

interface SupportRepositoryInterface
{

    public function getSupports(array|null $status = []): PaginationPresenter;
    public function findByIdSupport(string $id): object|null;
}