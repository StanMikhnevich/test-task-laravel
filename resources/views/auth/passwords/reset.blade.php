@extends('layouts.focus')

@section('content')
	<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-3xl sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-3xl">
                    {{ __('auth.resetPassword') }} 123
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('password.update') }}">
                    @csrf

					<input type="hidden" name="token" value="{{ $token }}">

					<div class="mb-3">
						<label for="AuthPasswordResetEmail" class="form-label">{{ __('auth.email') }}:</label>
						<input id="AuthPasswordResetEmail" type="email" name="email"
							   class="w-full mt-2 p-4 border border-gray-300 @error('email') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300"
							   value="{{ $email ?? old('name') }}" required autocomplete="email" autofocus
						>

						@error('email')
							<p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
						@enderror
					</div>

					<div class="mb-3">
						<label for="AuthPasswordResetPassword" class="form-label">{{ __('auth.password') }}:</label>
						<input id="AuthPasswordResetPassword" type="password" name="password"
							   class="w-full mt-2 p-4 border border-gray-300 @error('password') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300"
							   required autocomplete="new-password"
						>

						@error('password')
							<p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
						@enderror
					</div>

					<div class="mb-3">
						<label for="AuthPasswordResetPasswordConfirm" class="form-label">{{ __('auth.passwordConfirm') }}:</label>
						<input id="AuthPasswordResetPasswordConfirm" type="password" name="password_confirmation"
							   class="w-full mt-2 p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300"
							   required autocomplete="new-password"
						>
					</div>

					<div class="flex flex-wrap">
						<button type="submit"
								class="w-full rounded-lg py-4 font-bold text-base leading-normal bg-yellow-300 hover:bg-yellow-400">
							{{ __('auth.resetPassword') }}
						</button>
					</div>
                </form>

            </section>
        </div>
    </div>
</main>
@endsection
