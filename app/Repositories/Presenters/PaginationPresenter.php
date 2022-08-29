<?php
namespace App\Repositories\Presenters;

use App\Repositories\PaginationInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PaginationPresenter implements PaginationInterface
{

    public function __construct(
        private LengthAwarePaginator $pagination
    )
    {}
    
    public function items(): array
    {
        return $this->pagination->items();
    }

    public function total(): int
    {
        return $this->pagination->total() ?? 0;
    }

    public function currentPage(): int
    {
        return $this->pagination->currentPage() ?? 1;
    }

    public function lastPage(): int
    {
        return $this->pagination->lastPage();
    }

    public function firstPage(): int
    {
        return $this->pagination->firstItem() ?? 1;
    }

}