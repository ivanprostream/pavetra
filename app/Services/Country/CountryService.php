<?php

namespace App\Services\Country;

use Illuminate\Support\Facades\Auth;

use App\Repositories\Country\CountryRepository;

class CountryService
{
    protected $repository;

    public function __construct( CountryRepository $repository ) {
       $this->repository = $repository;
    }

    public function getAllCountries() {
        return $this->repository->all();
    }

    public function storeCountry($request) {
        return  $this->repository->store($request);
    }

    public function getItem($id) {
        return $this->repository->getRow($id);
    }

    public function updateCountry($request) {
        return  $this->repository->update($request);
    }

}
