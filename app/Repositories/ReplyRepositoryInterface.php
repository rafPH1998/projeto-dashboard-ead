<?php

namespace App\Repositories;


interface ReplyRepositoryInterface
{
    public function findById(string $id): ?object;
}