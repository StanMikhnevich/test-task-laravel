@extends('layouts.focus')

@section('title', __('auth.resetPassword'))

@section('content')
	<main class="sm:container sm:mx-auto sm:max-w-lg">
		<div class="w-full h-screen sm:py-12 sm:h-auto">
			<div class="w-full md:py-20">

            @if (session('status'))
            <div class="text-sm text-green-700 bg-green-100 px-5 py-6 sm:rounded sm:border sm:border-green-400 sm:mb-6"
                role="alert">
                {{ session('status') }}
            </div>
            @endif

            <section class="flex flex-col break-words bg-none sm:border-1 sm:rounded-3xl sm:shadow-lg sm:bg-white">
                <header class="font-semibold bg-none text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-3xl sm:bg-gray-200">
					{{ __('auth.resetPassword') }}
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('password.email') }}">
                    @csrf

					<div class="mb-3">
						<x-form.input-email id="AuthPasswordResetRequestEmail" value="{{ old('email') }}"
											error="{{ $errors->first('email') }}"
											autocomplete="email"
											:autofocus="true"
						/>
					</div>

					<div class="flex flex-wrap">
						<button type="submit" class="w-full m8h-btn m8h-btn-lg m8h-btn-primary">
							{{ __('auth.resetPassword') }}
						</button>

						<p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
							<a class="text-blue-500 hover:text-blue-700 no-underline hover:underline"
							   href="{{ route('login') }}">
								{{ __('auth.login') }}
							</a>
						</p>
					</div>
                </form>
            </section>
        </div>
    </div>
</main>
@endsection
