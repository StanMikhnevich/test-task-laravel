<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use App\Services\UserService;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
	{
        return Validator::make($data, [
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'phone' => ['required', 'string', 'min:19', 'max:19'],
			'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param array $request
	 * @return User
	 */
    protected function create(array $request)
    {
		$user = UserService::createUser($request);
		$user->sendEmailVerificationNotification();

		return $user;
    }

    /**
     * @return string
     */
    public function redirectTo(): string
    {
        return env('CLIENT_APP_URL');
    }
}
