<?php

namespace App\Http\Controllers\Error;

use App\Http\Controllers\Controller;
use App\Http\Requests\Error\ErrorFindRequest;
use App\Services\Error\ErrorServiceInterface;

class ErrorController extends Controller
{
    protected $errorService;

    public function __construct(ErrorServiceInterface $errorService)
    {
        $this->errorService = $errorService;
    }

    public function error()
    {
        return view('admin.error.error');
    }

    public function find(ErrorFindRequest $request)
    {
        $error = $this->errorService->find($request->only(['error_number']));

        return view('admin.error.show', compact('error'));
    }

}
