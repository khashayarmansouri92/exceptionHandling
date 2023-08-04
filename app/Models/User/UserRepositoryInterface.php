<?php

namespace App\Models\User;

interface UserRepositoryInterface
{
    public function login(array $attribute): bool;
}
