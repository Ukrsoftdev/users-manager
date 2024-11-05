<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Enums\UserRolesEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'sometimes',
                'max:255',
                'string',
                'required_without_all:email,password,role'
            ],
            'email' => [
                'sometimes',
                'email',
                'unique:users,email',
                'required_without_all:email,password,role'
            ],
            'password' => [
                'sometimes',
                'max:255',
                'string',
                'required_without_all:email,password,role'
            ],
            'role' => [
                'sometimes',
                Rule::enum(UserRolesEnum::class)
            ]
        ];
    }
}
