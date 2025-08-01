@props(['isDisabled' => false, 'modelName' => '', 'rows' => '4', 'placeholder' => ''])

<textarea wire:model.defer="{{ $modelName }}" id="{{ $modelName }}" rows="{{ $rows }}" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border {{ $errors->has($modelName) ? 'border-red-500 text-red-900 placeholder-red-700' : 'border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500' }} {{ $isDisabled ? 'disabled-input' : '' }}" placeholder="{{ $placeholder }}" {{ $isDisabled ? 'disabled' : '' }}></textarea>

@error($modelName) <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
