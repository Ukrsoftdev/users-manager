<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;

interface UserServiceInterface
{
    public function create(array $data): User;
    public function delete(User $user): bool;
    public function update(User $user, array $data): User;
}
