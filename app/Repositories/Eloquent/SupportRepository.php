<?php

namespace App\Repositories\Eloquent;

use App\Models\Support;
use App\Repositories\SupportRepositoryInterface;

class SupportRepository implements SupportRepositoryInterface
{

    public function __construct(protected Support $supports)
    {

    }

    public function getSupports(string $status = ''): array
    {
        $supports = $this->supports
                        ->where('status', $status)
                        ->with(['lesson', 'user'])
                        ->get();

        return $supports->toArray();
    }

    public function findById(string $id): object|null
    {
        return $this->supports
                ->with(['user', 'lesson', 'replies'])
                ->find($id);
    }

    
}

