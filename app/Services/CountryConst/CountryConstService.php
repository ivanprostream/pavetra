<?php

namespace App\Services\CountryConst;

use Illuminate\Support\Facades\Auth;

use App\Repositories\CountryConst\CountryConstRepository;

class CountryConstService
{
    protected $repository;

    public function __construct( CountryConstRepository $repository ) {
       $this->repository = $repository;
    }

    public function getAll() {
        return $this->repository->all();
    }

    public function storeCountryConst($request) {
        return  $this->repository->store($request);
    }

    public function delete($id) {
        return $this->repository->delete($id);
    }


}
