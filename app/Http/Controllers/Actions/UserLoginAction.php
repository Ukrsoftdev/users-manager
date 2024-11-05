<?php

declare(strict_types=1);

namespace App\Http\Controllers\Actions;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\UseCases\UserLoginUseCase;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class UserLoginAction extends Controller
{
    public function __construct(private readonly UserLoginUseCase $loginUseCase)
    {
    }

    /**
     * @param AuthLoginRequest $request
     * @return JsonResponse
     * @throws ValidationException
     */

    public function __invoke(AuthLoginRequest $request): JsonResponse
    {
        $tokenData = $this->loginUseCase->execute($request->validated());

        return response()->json($tokenData);
    }
}
