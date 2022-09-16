<?php

namespace App\Http\Repository;

use app\Models\Organization;
use Illuminate\Database\Eloquent\Collection;

class OrganizationRepository {

    /**
     * @return Collection
     */
    public function getAll(): ?Collection
    {
        return Organization::all();
    }

    /**
     * @param array $condition
     * @return mixed
     */
    public function getByCondition(array $condition)
    {
        return Organization::where($condition)->first();
    }

    /**
     * @param Organization $organization
     * @return bool
     */
    public function store(Organization $organization)
    {
        return $organization->save();
    }
}
