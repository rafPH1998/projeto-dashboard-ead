<?php

namespace App\Repositories\Eloquent;

use App\Models\{
    Admin,
    Course,
    User,
    Support
};

use App\Repositories\Presenters\PaginationPresenter;
use App\Repositories\StaticsRepositoryInterface;

class StaticsRepository implements StaticsRepositoryInterface
{

    public function getTotalUsers(): int
    {
        return User::count();
    }

    public function getTotalAdmins(): int
    {
        return Admin::count();
    }

    public function getTotalCourses(): int
    {
        return Course::count();
    }

    public function getTotalSupports(): int
    {
        return Support::where('status', 'pendente')->count();
    }



    
}

