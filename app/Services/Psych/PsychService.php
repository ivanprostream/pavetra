<?php

namespace App\Services\Psych;

use Illuminate\Support\Facades\Auth;

use App\Repositories\Psych\PsychRepository;

class PsychService
{
    protected $repository;

    public function __construct( PsychRepository $repository )
    {
       $this->repository = $repository;
    }

    public function getAllByCountry()
    {
        return $this->repository->allByCountry();
    }

}
