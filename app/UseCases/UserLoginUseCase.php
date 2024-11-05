<?php

declare(strict_types=1);

namespace App\UseCases;

use App\Enums\UserRolesEnum;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class UserLoginUseCase
{
    /**
     * @param array $data
     * @return array
     * @throws ValidationException
     */
    public function execute(array $data): array
    {
        /** @var User $user */
        $user = User::where('email', $data['email'])->get()->first();

        if (auth()->attempt($data) && UserRolesEnum::ADMIN == $user->role) {
            return $user->createToken($data['email'])->toArray();
        }

        throw ValidationException::withMessages(['The provided credentials do not match our records.']);
    }
}
