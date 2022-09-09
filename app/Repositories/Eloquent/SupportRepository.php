<?php

namespace App\Repositories\Eloquent;

use App\Models\Support;
use App\Repositories\Presenters\PaginationPresenter;
use App\Repositories\SupportRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class SupportRepository implements SupportRepositoryInterface
{

    public function __construct(
        protected Support $supports
    ){}

    public function getSupports(array|null $status = []): PaginationPresenter
    {
        $supports = $this->supports
                    ->join('users', 'users.id', '=', 'supports.user_id')
                    ->join('lessons', 'lessons.id', '=', 'supports.lesson_id')
                    ->when($status, function ($query) use ($status) {
                        $query->where('status', $status);
                        $query->orWhere('users.name', $status);
                        $query->orWhere('lessons.name', $status);       
                    })
                    ->with(['lesson', 'user'])
                    ->paginate();

        return new PaginationPresenter($supports);
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

