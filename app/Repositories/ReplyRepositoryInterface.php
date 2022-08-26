<?php

namespace App\Repositories;


interface ReplyRepositoryInterface
{

    public function createReplyToSupport(array $data): array;
    public function findById(string $id): ?object;
}