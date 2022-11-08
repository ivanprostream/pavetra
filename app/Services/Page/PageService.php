<?php

namespace App\Services\Page;


use Illuminate\Support\Facades\Auth;
use App\Repositories\Page\PageRepository;

class PageService
{
    protected $repository;

    public function __construct( PageRepository $repository ) {
       $this->repository = $repository;
    }

    public function getParentPages() {
        return $this->repository->allParent();
    }

    public function getAllPages() {
        return $this->repository->all();
    }

    public function getPageTemplates() {
        return $this->repository->templates();
    }

    public function getChildCategories($id) {
        return $this->repository->childCategories($id);
    }

    public function storePage($request) {
        return  $this->repository->store($request);
    }

    public function getItem($id) {
        return $this->repository->getRow($id);
    }

    public function updatePage($request, $id) {
        return  $this->repository->update($request, $id);
    }

    public function delete($id) {
        return $this->repository->delete($id);
    }

}
