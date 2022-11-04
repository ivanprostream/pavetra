<?php

namespace App\Services\Blog;


use Illuminate\Support\Facades\Auth;
use App\Repositories\Blog\BlogRepository;

class BlogService
{
    protected $repository;

    public function __construct( BlogRepository $repository ) {
       $this->repository = $repository;
    }

    public function getAllArticles() {
        return $this->repository->all();
    }

    public function storeArticle($request) {
        return  $this->repository->store($request);
    }

    public function getItem($id) {
        return $this->repository->getRow($id);
    }

    public function updateArticle($request, $id) {
        return  $this->repository->update($request, $id);
    }

    public function delete($id) {
        return $this->repository->delete($id);
    }

}
