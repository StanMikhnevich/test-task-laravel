@props([
	'id' => null,
	'class' => null,
	'label' => 'Пароль',
	'label2' => 'Підтвердження паролю',
	'name' => 'password',
	'value' => null,

	'error' => null,

	'placeholder' => null,

	'required' => true,
	'disabled' => false,
	'autofocus' => false,

	'confirmation' => false,
])

@php
	$mainClass = 'm8h-input-normal';

	if($error) {
		$mainClass = 'm8h-input-error';
	}

	if($disabled) {
		$mainClass = 'm8h-input-disabled';
	}
@endphp

@if($label)
<label for="{{ $id }}" class="form-label">{{ $label }}</label>
@endif

<input type="password"
    @if($id) id="{{ $id }}" @endif
    name="{{ $name }}"
    value="{{ $value }}"
   	class="{{ $mainClass }} m8h-input-md my-2 {{ $class }}"

	   @if($placeholder) placeholder="{{ $placeholder }}" @endif
	   autocomplete="new-password"

	   @if($required) required @endif
	   @if($disabled) disabled @endif
	   @if($autofocus) autofocus @endif
>

@if($confirmation)

@if($label2)
	<label for="{{ $id }}Confirmation" class="form-label">{{ $label2 }}</label>
@endif

<input type="password"
    @if($id) id="{{ $id }}Confirmation" @endif
    name="{{ $name . '_confirmation' }}"
    class="{{ $mainClass }} m8h-input-md mt-2 {{ $class }}"

	   @if($placeholder) placeholder="{{ $placeholder }}" @endif
	   autocomplete="new-password"

	   @if($required) required @endif
	   @if($disabled) disabled @endif
	   @if($autofocus) autofocus @endif
>
@endif

@if($error)
	<p class="text-red-500 text-xs italic">{{ $error }}</p>
@endif
