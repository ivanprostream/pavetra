<?php

namespace App\Services\Country;

use Illuminate\Support\Facades\Auth;

use App\Repositories\Country\CountryRepository;

class CountryService
{
    protected $repository;

    public function __construct( CountryRepository $repository )
    {
       $this->repository = $repository;
    }

    public function getAllCountries()
    {
        return $this->repository->all();
    }

}
