<?php

namespace App\Services\Error;

use App\Http\Requests\Error\ErrorFindRequest;
use App\Models\Error\ErrorRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class ErrorService implements ErrorServiceInterface
{
    protected $ErrorRepository;

    public function __construct(ErrorRepositoryInterface $ErrorRepository)
    {
        $this->ErrorRepository = $ErrorRepository; // Remove the extra $ symbol here
    }

    /**
     * @param array $attribute
     * @return Model
     */
    public function store(array $attribute): Model
    {
        return $this->ErrorRepository->store($attribute);
    }

    /**
     * @param $number
     * @return Model
     */
    public function find($number): Model
    {
        return $this->ErrorRepository->findByErrorNumber($number);
    }
}
