<div
    x-data="setupEditor(
    $wire.entangle('{{ $attributes->wire('model')->value() }}')
  )"
    x-init="() => init($refs.editor)"
    wire:ignore
    {{ $attributes->whereDoesntStartWith('wire:model') }}
>

    <div class="w-full mb-2 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
        <div class="flex items-center justify-between px-3 py-2 border-b dark:border-gray-600">
            <div class="flex flex-wrap items-center divide-gray-200 sm:divide-x sm:rtl:divide-x-reverse dark:divide-gray-600">
                <div class="flex items-center space-x-1 rtl:space-x-reverse sm:pe-4">
                    <button @click="toggleBold" class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700" type="button" data-hs-editor-bold="">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5h4.5a3.5 3.5 0 1 1 0 7H8m0-7v7m0-7H6m2 7h6.5a3.5 3.5 0 1 1 0 7H8m0-7v7m0 0H6"/>
                        </svg>
                        <span class="sr-only">Bold</span>
                    </button>
                    <button @click="toggleItalic" class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700" type="button" data-hs-editor-italic="">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8.874 19 6.143-14M6 19h6.33m-.66-14H18"/>
                        </svg>

                        <span class="sr-only">Italic</span>
                    </button>
                    <button @click="toggleUnderline" class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700" type="button" data-hs-editor-underline="">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M6 19h12M8 5v9a4 4 0 0 0 8 0V5M6 5h4m4 0h4"/>
                        </svg>
                        <span class="sr-only">Underline</span>
                    </button>
                    <button @click="toggleStrike" class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700" type="button" data-hs-editor-strike="">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 6.2V5h12v1.2M7 19h6m.2-14-1.677 6.523M9.6 19l1.029-4M5 5l6.523 6.523M19 19l-7.477-7.477"/>
                        </svg>
                        <span class="sr-only">Strike</span>
                    </button>
                    <button @click="toggleHeading" class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700" type="button" data-hs-editor-strike="">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6.2V5h11v1.2M8 5v14m-3 0h6m2-6.8V11h8v1.2M17 11v8m-1.5 0h3"/>
                        </svg>
                        <span class="sr-only">Heading</span>
                    </button>
                </div>
                <div class="flex flex-wrap items-center space-x-1 rtl:space-x-reverse sm:ps-4">
                    <button @click="textAlignLeft" class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700" type="button" data-hs-editor-link="">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd" d="M19 7H5a1 1 0 1 1 0-2h14a1 1 0 0 1 0 2m-4 4H5a1 1 0 0 1 0-2h10a1 1 0 0 1 0 2m4 4H5a1 1 0 0 1 0-2h14a1 1 0 0 1 0 2m-4 4H5a1 1 0 0 1 0-2h10a1 1 0 0 1 0 2"/>
                        </svg>
                        <span class="sr-only">Align Left</span>
                    </button>
                    <button @click="textAlignCenter" class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700" type="button" data-hs-editor-link="">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd" d="M19 7H5a1 1 0 1 1 0-2h14a1 1 0 0 1 0 2m-2 4H7a1 1 0 0 1 0-2h10a1 1 0 0 1 0 2m2 4H5a1 1 0 0 1 0-2h14a1 1 0 0 1 0 2m-2 4H7a1 1 0 0 1 0-2h10a1 1 0 0 1 0 2"/>
                        </svg>
                        <span class="sr-only">Align Center</span>
                    </button>
                    <button @click="textAlignRight" class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700" type="button" data-hs-editor-link="">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd" d="M19 7H5a1 1 0 1 1 0-2h14a1 1 0 0 1 0 2m0 4H9a1 1 0 0 1 0-2h10a1 1 0 0 1 0 2m0 4H5a1 1 0 0 1 0-2h14a1 1 0 0 1 0 2m0 4H9a1 1 0 0 1 0-2h10a1 1 0 0 1 0 2"/>
                        </svg>
                        <span class="sr-only">Align Right</span>
                    </button>
                    <button @click="textAlignJustify" class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700" type="button" data-hs-editor-link="">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd" d="M19 7H5a1 1 0 1 1 0-2h14a1 1 0 0 1 0 2m0 4H5a1 1 0 0 1 0-2h14a1 1 0 0 1 0 2m0 4H5a1 1 0 0 1 0-2h14a1 1 0 0 1 0 2m0 4H5a1 1 0 0 1 0-2h14a1 1 0 0 1 0 2"/>
                        </svg>
                        <span class="sr-only">Align Justify</span>
                    </button>
                </div>
                <div class="flex flex-wrap items-center space-x-1 rtl:space-x-reverse sm:ps-4">
                    <button @click="toggleLink" class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700" type="button" data-hs-editor-link="">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.213 9.787a3.391 3.391 0 0 0-4.795 0l-3.425 3.426a3.39 3.39 0 0 0 4.795 4.794l.321-.304m-.321-4.49a3.39 3.39 0 0 0 4.795 0l3.424-3.426a3.39 3.39 0 0 0-4.794-4.795l-1.028.961"/>
                        </svg>
                        <span class="sr-only">Hyperlink</span>
                    </button>
                    <button @click="toggleOrderedList" class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700" type="button" data-hs-editor-ol="">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd" d="M10 4h10a1 1 0 0 1 0 2H10a1 1 0 1 1 0-2m0 7h10a1 1 0 0 1 0 2H10a1 1 0 0 1 0-2m0 7h10a1 1 0 0 1 0 2H10a1 1 0 0 1 0-2M4.5 4a.5.5 0 0 1 0-1h1c.28 0 .5.22.5.5v3a.5.5 0 0 1-1 0V4.015zm0 6h2c.28 0 .5.22.5.5v.5l-1.7 2h1.2c.28 0 .5.22.5.5s-.224.5-.5.5h-2c-.28 0-.5-.22-.5-.5V13l1.7-2H4.5c-.28 0-.5-.22-.5-.5s.199-.5.5-.5m2 11h-2a.5.5 0 1 1 0-1H6v-.5H4.5a.5.5 0 1 1 0-1H6V18H4.5a.5.5 0 1 1 0-1h2a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5"/>
                        </svg>
                        <span class="sr-only">Order List</span>
                    </button>
                    <button @click="toggleBulletList" class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700" type="button" data-hs-editor-ul="">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd" d="M10 4h10a1 1 0 0 1 0 2H10a1 1 0 1 1 0-2m0 7h10a1 1 0 0 1 0 2H10a1 1 0 0 1 0-2m0 7h10a1 1 0 0 1 0 2H10a1 1 0 0 1 0-2M5 7a2 2 0 1 1 0-4a2 2 0 0 1 0 4m0 7a2 2 0 1 1 0-4a2 2 0 0 1 0 4m0 7a2 2 0 1 1 0-4a2 2 0 0 1 0 4"/>
                        </svg>
                        <span class="sr-only">Bullet List</span>
                    </button>
                    <button @click="indentLine" class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700" type="button" data-hs-editor-blockquote="">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M5 6a1 1 0 0 1 1-1h12a1 1 0 1 1 0 2H6a1 1 0 0 1-1-1Zm0 12a1 1 0 0 1 1-1h12a1 1 0 1 1 0 2H6a1 1 0 0 1-1-1Zm1.65-9.76A1 1 0 0 0 5 9v6a1 1 0 0 0 1.65.76l3.5-3a1 1 0 0 0 0-1.52l-3.5-3ZM12 10a1 1 0 0 1 1-1h5a1 1 0 1 1 0 2h-5a1 1 0 0 1-1-1Zm0 4a1 1 0 0 1 1-1h5a1 1 0 1 1 0 2h-5a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                        </svg>
                        <span class="sr-only">Indent</span>
                    </button>
                    <button @click="outdentLine" class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700" type="button" data-hs-editor-code="">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M5 6a1 1 0 0 1 1-1h12a1 1 0 1 1 0 2H6a1 1 0 0 1-1-1Zm0 12a1 1 0 0 1 1-1h12a1 1 0 1 1 0 2H6a1 1 0 0 1-1-1Zm3.85-9.76A1 1 0 0 1 10.5 9v6a1 1 0 0 1-1.65.76l-3.5-3a1 1 0 0 1 0-1.52l3.5-3ZM12 10a1 1 0 0 1 1-1h5a1 1 0 1 1 0 2h-5a1 1 0 0 1-1-1Zm0 4a1 1 0 0 1 1-1h5a1 1 0 1 1 0 2h-5a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                        </svg>
                        <span class="sr-only">Outdent</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="px-4 py-2 bg-white rounded-b-lg dark:bg-gray-800">
            <label for="editor" class="sr-only">Publish post</label>
            <div x-ref="editor" id="editor" class="block w-full min-h-72 px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white"></div>
        </div>
    </div>
</div>
