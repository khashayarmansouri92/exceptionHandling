<?php

namespace App\Models\Error;

use App\Models\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class ErrorRepository extends BaseRepository implements ErrorRepositoryInterface
{
    protected $model;
    public function __construct(Error $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param $number
     * @return Model
     */
    public function findByErrorNumber($number): Model
    {
        return $this->model->findWithErrorNumber($number);
    }
}
