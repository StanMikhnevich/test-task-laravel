@extends('layouts.focus')

@section('title', __('auth.login'))

@section('content')
	<main class="sm:container sm:mx-auto sm:max-w-lg">
		<div class="w-full h-screen sm:py-12 sm:h-auto">
			<div class="w-full md:py-20">

				<section class="flex flex-col break-words bg-none sm:border-1 sm:rounded-3xl sm:shadow-xl sm:bg-white">
					<header class="font-semibold bg-none py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-3xl sm:bg-gray-200">
						{{ __('auth.login') }}
					</header>

					<form class="w-full px-6 sm:px-10" method="POST" action="{{ route('login') }}">
						@csrf

						<ul class="mt-6 space-y-4">
							<li>
								<x-form.input-email id="AuthLoginEmail" value="{{ old('email') }}"
													error="{{ $errors->first('email') }}"
													autocomplete="email"
													:autofocus="true"
								/>
							</li>

							<li>
								<x-form.input-password id="AuthLoginPassword" error="{{ $errors->first('password') }}"/>
							</li>

							<li class="py-4 flex items-center">
								<x-form.checkbox id="AuthLoginRemember" name="remember" :label="__('auth.remember')"
												 error="{{ $errors->first('password') }}"
												 :checked="old('remember')"
								/>

								@if (Route::has('password.request'))
									<a class="text-sm text-blue-500 hover:text-blue-700 whitespace-no-wrap no-underline hover:underline ml-auto"
									   href="{{ route('password.request') }}"
									>
										{{ __('auth.forgotPasswordQ') }}
									</a>
								@endif
							</li>

							<li class="flex flex-wrap">
								<button type="submit" class="w-full mt-4 m8h-btn m8h-btn-lg m8h-btn-primary">
									{{ __('auth.login') }}
								</button>

								@if (Route::has('register'))
									<p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
										{{ __('auth.dontHaveAnAccountQ') }}
										<a class="text-blue-500 hover:text-blue-700 no-underline hover:underline"
										   href="{{ route('register') }}">
											{{ __('auth.register') }}
										</a>
									</p>
								@endif
							</li>
						</ul>
					</form>
				</section>

			</div>
		</div>
	</main>
@endsection
