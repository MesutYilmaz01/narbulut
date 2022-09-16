<?php

namespace App\Http\Contracts;

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
}
