<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginUserRequest;
use App\Services\AuthService;
use App\Traits\HasApiResponse;
use Illuminate\Http\JsonResponse;

class ApiLoginController extends Controller
{
    use HasApiResponse;

	public function __invoke(LoginUserRequest $request): JsonResponse
    {
        $user = AuthService::login($request->validated());

        if(!$user) return $this->error('Email & Password does not match.', 401);

        return $this->success([
            'token' => $user->createToken("API TOKEN")->plainTextToken,
            'user' => $user
        ]);
    }

}
