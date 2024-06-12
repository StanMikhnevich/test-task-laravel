<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class BaseFormRequest extends FormRequest
{
    /**
     * @param null $guard
     * @return User|null
     */
    public function authUser($guard = null): ?User
    {
        return parent::user($guard);
    }

    /**
     * @param null $guard
     * @return User
     */
    public function authUserStrict($guard = null): User
    {
        $user = $this->authUser($guard);

        if (!$user) {
            abort(403);
        }

        return $user;
    }

    /**
     * @param null $guard
     * @return bool
     */
    public function isAuthenticated($guard = null): bool
    {
        return (bool)$this->authUser($guard);
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
