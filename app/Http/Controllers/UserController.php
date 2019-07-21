<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param UserCreateRequest $request
     * @return UserResource
     */
    public function create(UserCreateRequest $request): JsonResource
    {
        $requestValidated = $request->validated();
        return new UserResource($this->userService->create($requestValidated));
    }

    public function show(User $user): JsonResource
    {
        return new UserResource($user);
    }
}
