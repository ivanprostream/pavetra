<?php

namespace App\Services\Category;

use Illuminate\Support\Facades\Auth;

use App\Repositories\Category\CategoryRepository;

class CategoryService
{
    protected $repository;

    public function __construct( CategoryRepository $repository ) {
       $this->repository = $repository;
    }

    public function getParentCategories() {
        return $this->repository->allParent();
    }

    public function storeCategory($request) {
        return  $this->repository->store($request);
    }

    public function getChildCategories($id) {
        return $this->repository->childCategories($id);
    }

    public function getItem($id) {
        return $this->repository->getRow($id);
    }

    public function updateCategory($request, $id) {
        return  $this->repository->update($request, $id);
    }

    public function delete($id) {
        return $this->repository->delete($id);
    }


}
