<?php

namespace App\Services\User;

interface UserServiceInterface
{
    public function login(array $attribute): bool;
}
