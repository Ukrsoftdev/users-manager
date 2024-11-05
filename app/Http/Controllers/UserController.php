<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserServiceInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function __construct(private readonly UserServiceInterface $userService)
    {
    }

    public function create(CreateUserRequest $request): JsonResponse
    {
        return response()->json(
            data: new UserResource($this->userService->create($request->validated())),
            status: Response::HTTP_CREATED,
        );
    }

    public function update(User $user, UpdateUserRequest $request): JsonResponse
    {
        return response()->json(
            data: new UserResource($this->userService->update($user, $request->validated())),
            status: Response::HTTP_ACCEPTED,
        );
    }

    public function destroy(User $user): JsonResponse
    {
        $this->userService->delete($user);

        return response()->json(
            status: Response::HTTP_NO_CONTENT,
        );
    }
}
