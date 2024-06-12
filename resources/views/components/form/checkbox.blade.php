@props([
	'id' => null,
	'class' => null,
	'label' => null,
	'name' => null,
	'value' => null,

	'error' => null,

	'required' => false,
	'disabled' => false,
	'checked' => false,
])

@php
	$mainClass = 'm8h-checkbox-normal';

	if($error) {
		$mainClass = 'm8h-checkbox-error';
	}

	if($disabled) {
		$mainClass = 'm8h-checkbox-disabled';
	}
@endphp

<label class="inline-flex space-x-2 items-center text-sm" for="{{ $id }}" >
	<input type="checkbox"
		   @if($id) id="{{ $id }}" @endif
		   name="{{ $name }}"
		   @if($value) value="{{ $value }}" @endif
		   class="{{ $mainClass }} m8h-checkbox-md {{ $class }}"

		   @if($required) required @endif
		   @if($disabled) disabled @endif
		   @if($checked) checked @endif
	>
	<span>{{ $label }}</span>
</label>

@if($error)
	<p class="text-red-500 text-xs italic">{{ $error }}</p>
@endif
