<?php

namespace App\Models\User;

use App\Models\BaseRepository;
use Illuminate\Support\Facades\Auth;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * @param array $attribute
     * @return bool
     */
    public function login(array $attribute): bool
    {
        return Auth::attempt($attribute);
    }
}
