<?php

namespace App\Repositories\Eloquent;

use App\Models\ReplySupport;
use App\Repositories\ReplyRepositoryInterface;

class ReplyRepository implements ReplyRepositoryInterface
{

    public function __construct(
        protected ReplySupport $reply_supports
    ){}

    public function createReplyToSupport(array $data): array
    {
        return $this->reply_supports->create($data);
    }

    public function findById(string $id): object|null
    {
        return $this->reply_supports
                ->with(['user', 'lesson', 'replies'])
                ->find($id);
    }

    
}

