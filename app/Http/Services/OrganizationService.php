<?php

namespace App\Http\Services;

use App\Http\Contracts\IOrganizationService;
use App\Http\Repository\OrganizationRepository;
use App\Models\Organization;

class OrganizationService implements IOrganizationService
{
    /**
     * @var OrganizationRepository
     */
    private OrganizationRepository $organizationRepository;

    /**
     * @param OrganizationRepository $organizationRepository
     */
    public function __construct (OrganizationRepository $organizationRepository)
    {
        $this->organizationRepository = $organizationRepository;
    }

    /**
     * @return mixed
     */
    public function getAll ()
    {
        return $this->organizationRepository->getAll();
    }

    /**
     * @param array $condition
     * @return mixed
     */
    public function getByCondition (array $condition)
    {
        return $this->organizationRepository->getByCondition($condition);
    }

    /**
     * @param Organization $organization
     * @return bool|mixed
     */
    public function store(Organization $organization)
    {
        return $this->organizationRepository->store($organization);
    }
}
