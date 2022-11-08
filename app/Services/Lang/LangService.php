<?php

namespace App\Services\Lang;

use Illuminate\Support\Facades\Auth;

use App\Repositories\Lang\LangRepository;

class LangService
{
    protected $repository;

    public function __construct( LangRepository $repository ) {
       $this->repository = $repository;
    }

    public function getAllLangs() {
        return $this->repository->all();
    }

    public function storeLang($request) {
        return  $this->repository->store($request);
    }

    public function updateLang($request) {
        return  $this->repository->update($request);
    }



    public function getItem($id) {
        return $this->repository->getRow($id);
    }

}
