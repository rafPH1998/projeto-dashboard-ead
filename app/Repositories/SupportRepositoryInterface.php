<?php

namespace App\Repositories;

use App\Repositories\Presenters\PaginationPresenter;

interface SupportRepositoryInterface
{

    public function getSupports(string $status = 'pendente'): PaginationPresenter;
    public function findByIdSupport(string $id): object|null;
}