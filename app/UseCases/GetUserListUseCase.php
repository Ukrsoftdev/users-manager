<?php

declare(strict_types=1);

namespace App\UseCases;

use App\Http\Collections\UserListCollection;
use App\Models\User;

class GetUserListUseCase
{
    public function execute(int|null $limit): UserListCollection
    {
        $query = User::query()->select('id', 'name', 'email', 'created_at', 'role');

        $paginator = $query->paginate($limit ?? config('api.pagination_limit'));
        $collection = new UserListCollection($paginator);

        return $collection;
    }
}
