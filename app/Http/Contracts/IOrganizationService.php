<?php

namespace App\Http\Contracts;

interface IOrganizationService {

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
