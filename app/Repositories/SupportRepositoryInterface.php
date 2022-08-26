<?php

namespace App\Repositories;


interface SupportRepositoryInterface
{

    public function getSupports(string $status = 'P'): array;
    public function findByIdSupport(string $id): object|null;
}