@props(['modelName' => 'label-model', 'text' => 'label-text', 'isRequired' => false])

<label for="{{ $modelName }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $text }} {!! $isRequired ? '<span class="text-red-600">*</span>' : '' !!}</label>
