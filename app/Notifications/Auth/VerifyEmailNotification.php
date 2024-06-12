<?php

namespace App\Notifications\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;

class VerifyEmailNotification extends \Illuminate\Auth\Notifications\VerifyEmail
{
	use Queueable;

	/**
	 * Get the verify email notification mail message for the given URL.
	 *
	 * @param  string  $url
	 * @return MailMessage
	 */
	protected function buildMailMessage($url)
	{
		return (new MailMessage)
			->subject(__('auth.emailVerificationEmailSubject'))
			->greeting(__('general.greeting'))
			->line(__('auth.emailVerificationEmailText'))
			->action(__('auth.emailVerify'), $url)
			->line(__('auth.emailVerificationNoActionIsRequired'));
	}

}
