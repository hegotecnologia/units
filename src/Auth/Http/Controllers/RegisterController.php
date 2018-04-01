<?php

namespace HEGO\Auth\Http\Controllers;

use HEGO\Auth\Http\Requests\RegisterUserRequest;
use HEGO\Auth\Services\RegisterService;
use HEGO\Support\Units\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @param RegisterUserRequest $request
     * @param RegisterService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterUserRequest $request, RegisterService $service)
    {
        $user = $service->create($request->only('name', 'email', 'password'));

        return $user;
    }
}