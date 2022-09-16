<?php

namespace App\Http\Controllers;

use App\Http\Contracts\IOrganizationService;
use App\Http\Resources\OrganizationResource;

class OrganizationController extends Controller
{
    /**
     * @var IOrganizationService
     */
    private IOrganizationService $organizationService;

    /**
     * @param IOrganizationService $organizationService
     */
    public function __construct(IOrganizationService $organizationService)
    {
        $this->organizationService = $organizationService;
    }

    /**
     * @return View
     */
    public function index()
    {
        return OrganizationResource::collection($this->organizationService->getAll());
    }

    /**
     * @param string $uuid
     * @return View
     */
    public function getByUuid(string $uuid)
    {
        return new OrganizationResource($this->organizationService->getByCondition(['uuid' => $uuid]));
    }

}
