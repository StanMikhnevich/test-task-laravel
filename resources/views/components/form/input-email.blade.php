@props([
	'id' => null,
	'class' => null,
	'label' => 'Email',
	'name' => 'email',
	'value' => null,
	'oldValue' => null,

	'error' => null,

	'placeholder' => null,
	'autocomplete' => null,

	'required' => true,
	'disabled' => false,
	'autofocus' => false,
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

<input type="email"
    @if($id) id="{{ $id }}" @endif
    name="{{ $name }}"
    value="{{ $value ?? $oldValue }}"
   	class="{{ $mainClass }} m8h-input-md mt-2 {{ $class }}"

	   @if($placeholder) placeholder="{{ $placeholder }}" @endif
	   @if($autocomplete) autocomplete="{{ $autocomplete }}" @endif

	   @if($required) required @endif
	   @if($disabled) disabled @endif
	   @if($autofocus) autofocus @endif
>

@if($error)
	<p class="text-red-500 text-xs italic">{{ $error }}</p>
@endif
