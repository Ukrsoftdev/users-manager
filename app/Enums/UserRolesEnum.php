<?php

declare(strict_types=1);

namespace App\Enums;

enum UserRolesEnum: string
{
    case REGULAR = 'regular';
    case ADMIN = 'admin';
}
