<?php

namespace App\Http\Controllers;

use App\Http\Contracts\IOrganizationService;
use App\Http\Resources\OrganizationResource;
use Illuminate\Support\Facades\Cache;

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
        $organizationService = $this->organizationService;
        return Cache::remember('organizations', 60*60*24, function () {
            return OrganizationResource::collection($this->organizationService->getAll());
        });
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
