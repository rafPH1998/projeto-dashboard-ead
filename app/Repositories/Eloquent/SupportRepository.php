<?php

namespace App\Repositories\Eloquent;

use App\Models\Support;
use App\Repositories\Presenters\PaginationPresenter;
use App\Repositories\SupportRepositoryInterface;
use Illuminate\Support\Facades\DB;

class SupportRepository implements SupportRepositoryInterface
{

    public function __construct(
        protected Support $supports
    ){}

    public function getSupports(string $status = '', int $page = 1): PaginationPresenter
    {

        $supports = $this->supports
                        ->where('status', $status)
                        ->with(['lesson', 'user'])
                        ->paginate(10);
                        
        return new PaginationPresenter($supports);
    }

    public function search(array $filter = []): array
    {

    }
    
    public function findByIdSupport(string $id): object|null
    {
        return $this->supports
                    ->with([
                        'user', 
                        'lesson', 
                        'replies' => [
                            'user',
                            'admin'
                        ],
                    ])
                    ->find($id);
    }

    
}

