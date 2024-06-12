<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use App\Traits\HasApiResponse;
use Illuminate\Http\JsonResponse;

class ApiLogoutController extends Controller
{
    use HasApiResponse;

	public function __invoke(): JsonResponse
    {
        AuthService::logout();

        return $this->success([]);
    }

}
