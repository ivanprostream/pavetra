<?php

namespace App\Services\User;

use App\Repositories\User\UserRepository;

class UserService
{
    protected $repository;

    public function __construct( UserRepository $repository ) {
       $this->repository = $repository;
    }

    public function all() {
    return $this->repository->all();
    }

    public function getItem($id) {
        return $this->repository->getRow($id);
    }

    public function authUser() {
        return $this->repository->authUser();
    }

    public function updateSetting($request) {
        return $this->repository->updateSetting($request);
    }

    public function updatePassword($request) {
        return $this->repository->updatePassword($request);
    }

    public function allUsers() {
        return $this->repository->all();
    }

    public function storeUser($request) {
        return $this->repository->create($request);
    }

    public function updateUser($request) {
        return $this->repository->update($request);
    }

    public function delete($id) {
        return $this->repository->delete($id);
    }




}
