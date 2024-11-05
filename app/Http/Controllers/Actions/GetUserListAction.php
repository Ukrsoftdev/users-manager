<?php

declare(strict_types=1);

namespace App\Http\Controllers\Actions;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetUserListRequest;
use App\UseCases\GetUserListUseCase;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GetUserListAction extends Controller
{
    public function __construct(private readonly GetUserListUseCase $useCase)
    {
    }

    public function __invoke(GetUserListRequest $request): JsonResponse
    {
        return response()->json(
            $this->useCase->execute($request->validated('limit')),
            Response::HTTP_OK
        );
    }
}
