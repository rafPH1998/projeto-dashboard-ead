<?php

namespace App\Repositories;


interface SupportRepositoryInterface
{

    public function getSupports(string $status = 'P'): array;
    public function findById(string $id): object|null;
}