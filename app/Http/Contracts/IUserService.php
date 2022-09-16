<?php

namespace App\Http\Contracts;

use App\Models\User;

interface IUserService {

    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @param array $condition
     * @return mixed
     */
    public function getByCondition(array $condition);

    /**
     * @param User $user
     * @return mixed
     */
    public function store(User $user);

    /**
     * @param string $email
     * @return mixed
     */
    public function isExist(string $email);
}
