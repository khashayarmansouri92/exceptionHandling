<?php

namespace App\Services\Error;

use Illuminate\Database\Eloquent\Model;

interface ErrorServiceInterface
{
    public function store(array $attribute): Model;

    public function find($number): Model;
}
