<?php

namespace HEGO\Auth\Services;

use Symfony\Component\HttpFoundation\Response;
use HEGO\Domains\Auth\Events\Created;
use HEGO\Domains\Auth\Exceptions\CouldNotGenerateToken;
use HEGO\Domains\Users\Contracts\Repositories\UserRepository;
use HEGO\Domains\Users\Models\User;

class RegisterService
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param array $data
     * @return User
     * @throws CouldNotGenerateToken
     */
    public function create(array $data)
    {
        $user = $this->userRepository->create($data);
        event(new Created($user));
        $this->guard()->login($user);

        try {
            $token = app('tymon.jwt.auth')->fromUser($user);
        } catch (CouldNotGenerateToken $e) {
            return $e->getMessage();
        }

        return response()->json(['token' => $token], Response::HTTP_CREATED);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return auth()->guard();
    }
}