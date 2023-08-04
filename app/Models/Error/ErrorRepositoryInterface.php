<?php

namespace App\Models\Error;

use Illuminate\Database\Eloquent\Model;

interface ErrorRepositoryInterface
{
    public function findByErrorNumber($number): Model;
}
