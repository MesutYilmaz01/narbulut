<?php

namespace App\Http\Contracts;

use App\Models\Organization;

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

    /**
     * @param Organization $organization
     * @return mixed
     */
    public function store(Organization $organization);

}
