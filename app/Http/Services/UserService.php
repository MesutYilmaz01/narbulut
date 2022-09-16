<?php

namespace App\Http\Services;

use App\Http\Contracts\IUserService;
use App\Http\Repository\UserRepository;
use App\Models\User;

class UserService implements IUserService
{
    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct (UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return mixed
     */
    public function getAll ()
    {
        return $this->userRepository->getAll();
    }

    /**
     * @param array $condition
     * @return mixed
     */
    public function getByCondition (array $condition)
    {
        return $this->userRepository->getByCondition($condition);
    }

    /**
     * @param User $user
     * @return bool|mixed
     */
    public function store(User $user)
    {
        return $this->userRepository->store($user);
    }

    /**
     * @param string $email
     * @return mixed
     */
    public function isExist(string $email) {
        return $this->userRepository->isExist($email);
    }
}
