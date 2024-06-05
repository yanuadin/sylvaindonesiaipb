@props(['isDisabled' => false, 'type' => 'text', 'modelName' => '', 'placeholder' => ''])

<input type="{{ $type }}" wire:model.defer="{{ $modelName }}" id="{{ $modelName }}" class="bg-gray-50 border text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5  {{ $errors->has($modelName) ? 'border-red-500 text-red-900 placeholder-red-700' : 'border-gray-300 text-gray-900 dark:placeholder-gray-400 dark:bg-gray-600 dark:border-gray-500 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500' }} {{ $isDisabled ? 'disabled-input' : '' }}" placeholder="{{ $placeholder ?? '' }}" {{ $isDisabled ? 'disabled' : '' }}>

@error($modelName) <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
