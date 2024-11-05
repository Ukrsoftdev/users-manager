<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;

class UserService implements UserServiceInterface
{
    public function create(array $data): User
    {
        return User::query()->create($data);
    }

    public function delete(User $user): bool
    {
        return $user->delete();
    }

    public function update(User $user, array $data): User
    {
        $user->update($data);

        return $user->fresh();
    }
}
