<?php

namespace App\Services\Category;

use Illuminate\Support\Facades\Auth;

use App\Repositories\Category\CategoryRepository;

class CategoryService
{
    protected $repository;

    public function __construct( CategoryRepository $repository )
    {
       $this->repository = $repository;
    }

    public function getParentCategories()
    {
        return $this->repository->allParent();
    }

}
