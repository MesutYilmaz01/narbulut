<?php

namespace App\Http\Controllers;

use App\Http\Contracts\IUserService;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    /**
     * @var IUserService
     */
    private IUserService $userService;

    /**
     * @param IUserService $userService
     */
    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return UserResource::collection($this->userService->getAll());
    }

    public function getByUuid(string $uuid)
    {
        return new UserResource($this->userService->getByCondition(['uuid' => $uuid]));
    }
}
