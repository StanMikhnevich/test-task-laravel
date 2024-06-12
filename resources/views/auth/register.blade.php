@extends('layouts.focus')

@section('title', __('auth.register'))

@section('content')
	<main class="sm:container sm:mx-auto sm:max-w-lg">
		<div class="w-full h-screen sm:py-12 sm:h-auto">
			<div class="w-full">
				<section class="flex flex-col break-words bg-none sm:border-1 sm:rounded-md sm:shadow-lg sm:bg-white">
					<header class="font-semibold bg-none text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md sm:bg-gray-200">
						{{ __('auth.register') }}
					</header>

					<form action="{{ route('register') }}" method="POST" class="w-full px-6 sm:px-10">
						@csrf

						<ul class="mt-6 space-y-4">
							<li>
								<x-form.input-text id="AuthRegisterName" label="Ім'я" name="name" value="{{ old('name') }}"
												   error="{{ $errors->first('name') }}"
												   autocomplete="name"
												   :autofocus="true"
								/>
							</li>

							<li>
								<x-form.input-email id="AuthRegisterEmail" value="{{ old('email') }}"
													error="{{ $errors->first('email') }}"
													autocomplete="email"
								/>
							</li>

							<li>
								<x-form.tel id="AuthRegisterPhone" value="{{ old('phone') }}"
											error="{{ $errors->first('phone') }}"
											autocomplete="phone"
								/>
							</li>

							<li>
								<x-form.input-password id="AuthRegisterPassword" :confirmation="true"
													   error="{{ $errors->first('password') }}"
								/>
							</li>

							<li>
								<button type="submit" class="w-full mt-4 m8h-btn m8h-btn-lg m8h-btn-primary">{{ __('auth.register') }}</button>

								<p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
									{{ __('auth.hasAccountQ') }}
									<a class="text-blue-500 hover:text-blue-700 no-underline hover:underline"
									   href="{{ route('login') }}">
										{{ __('auth.login') }}
									</a>
								</p>
							</li>


						</ul>
					</form>
				</section>
			</div>
		</div>
	</main>
@endsection
