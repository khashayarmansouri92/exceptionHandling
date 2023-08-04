<?php

namespace App\Services\User;

use App\Models\User\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class UserService implements UserServiceInterface
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository; // Remove the extra $ symbol here
    }

    /**
     * @param array $attribute
     * @return Model
     */
    public function store(array $attribute): Model
    {
        return $this->userRepository->store($attribute);
    }

    /**
     * @param array $attribute
     * @return bool
     */
    public function login(array $attribute): bool
    {
        return $this->userRepository->login($attribute);
    }
}
