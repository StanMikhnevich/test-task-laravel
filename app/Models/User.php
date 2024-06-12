<?php

namespace App\Models;

use App\Notifications\Auth\PasswordResetNotification;
use App\Notifications\Auth\VerifyEmailNotification;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail, CanResetPassword
{
	use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

	protected $fillable = [
		'name',
		'email',
		'password',
	];

	protected $hidden = [
		'password',
		'remember_token',
	];

	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	/**
	 * @param $value
	 * @param string|null $column
	 * @return User|Builder|Model|object|null
	 */
	public static function findBy($value, ?string $column = 'id'): ?self
	{
		return self::where($column, $value)->first();
	}

	/**
	 * @param array $filters
	 * @param Builder|null $builder
	 * @return Builder
	 */
	public static function filterQuery(array $filters = [], Builder $builder = null): Builder
	{
		$builder = $builder ?: User::query();

		$name = (string)($filters['name'] ?? null);
		$email = (string)($filters['email'] ?? null);

		if ($name) {
			$builder->where('name', 'LIKE', "%$name%");
		}

		if ($email) {
            $builder->where('email', 'LIKE', "%$email%");
		}

		return $builder;
	}

	public function unverify()
	{
		$this->email_verified_at = null;
		$this->save();
	}

	public function getIsVerifiedAttribute(): bool
	{
		return $this->hasVerifiedEmail();
	}

	/**
	 * Send the email verification notification.
	 *
	 * @return void
	 */
	public function sendEmailVerificationNotification()
	{
		$this->notify(new VerifyEmailNotification);
	}

	/**
	 * Send the email password reset notification.
	 *
	 * @return void
	 */
	public function sendPasswordResetNotification($token)
	{
		$this->notify(new PasswordResetNotification($token));
	}

}
