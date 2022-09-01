<?php

namespace App\Http\Controllers;

use App\Repositories\StaticsRepositoryInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(
        protected StaticsRepositoryInterface $repository
    ) {}

    public function index()
    {
        $totalUsers = $this->repository->getTotalUsers();
        $totalAdmins = $this->repository->getTotalAdmins();
        $totalCourses = $this->repository->getTotalCourses();
        $totalSupports = $this->repository->getTotalSupports();

        return view('admin.home.index', [
            'totalUsers' => $totalUsers, 
            'totalAdmins' => $totalAdmins,  
            'totalCourses' => $totalCourses,  
            'totalSupports' => $totalSupports,  
        ]);
    }
}
