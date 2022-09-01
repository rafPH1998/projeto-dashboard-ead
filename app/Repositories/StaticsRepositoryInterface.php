<?php

namespace App\Repositories;

interface StaticsRepositoryInterface
{ 
    public function getTotalUsers(): int;
    public function getTotalAdmins(): int;
    public function getTotalCourses(): int;
    public function getTotalSupports(): int;
}