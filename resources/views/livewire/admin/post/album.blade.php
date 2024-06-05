<div>
    <x-flowbite.table
        :tableHead="$tableHead"
        :datas="$albums"
        :dataModal="$dataModal"
        :search="$search"
        isCustom="true"
    >
        <x-slot:button>
            <button data-modal-target="{{ $dataModal }}" data-modal-toggle="{{ $dataModal }}" type="button" class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                </svg>
                Tambah Album
            </button>

            <!-- Form Modal -->
            <x-flowbite.modal
                :title-modal="$titleModal"
                :data-modal="$dataModal"
                max-width="max-w-xl"
            >
                <x-slot:content-modal>
                    <form wire:submit.prevent="{{ $submitMethod }}" class="p-4 md:p-5" enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-4">
                                <x-flowbite.label modelName="title" text="Judul" isRequired="true"/>
                                <x-flowbite.input type="text" modelName="title" placeholder="Masukkan judul" :is-disabled="$isViewMode"/>
                            </div>
                            <div class="col-span-4">
                                <x-flowbite.label modelName="description" text="Deskripsi"/>
                                <x-flowbite.textarea rows="4" modelName="description" placeholder="Masukkan deskripsi" :is-disabled="$isViewMode"/>
                            </div>
                            @if($image !== null && !is_string($image))
                                <div class="col-span-4 text-center mx-auto">
                                    <img class="max-h-96 max-w-full" src="{{ $image->temporaryUrl() }}" alt="Image Preview">
                                </div>
                            @endif
                            @if(is_string($image))
                                <div class="col-span-4 text-center mx-auto">
                                    <img class="max-h-96 max-w-full" src="{{ asset('storage/' . $image) }}" alt="Image Preview">
                                </div>
                            @endif
                            @if(!$isViewMode)
                                <div class="col-span-4">
                                    <x-flowbite.label modelName="image" text="Gambar" isRequired="true"/>
                                    <input wire:model="image" class="block w-full text-sm border {{ $errors->has('image') ? 'border-red-500 text-red-900' : 'text-gray-900 border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400'}} rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="image" type="file">
                                    @error('image') <span class="text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                                </div>
                            @endif
                        </div>

                        <div class="flex {{ $isViewMode ? 'justify-center' : 'justify-between' }} items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-hide="{{ $dataModal }}" type="button" class="hideModal py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Close</button>
                            @if(!$isViewMode)
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                            @endif
                        </div>
                    </form>
                </x-slot:content-modal>
            </x-flowbite.modal>
        </x-slot:button>

        <x-slot:table>
            @foreach($albums as $keyData => $data)
                <tr class="border-b dark:border-gray-700">
                    <td class="px-4 py-3 w-16">{{ $albums->firstItem() + $keyData }}</td>
                    <td class="px-4 py-3">{{ $data['title'] }}</td>
                    <td class="px-4 py-3">{{ $data['description'] }}</td>
                    <td class="px-4 py-3"><img class="max-w-32 max-h-32" src="{{ asset('storage/' . $data['image']) }}" alt="{{ $data['title'] }}"></td>
                    <td class="px-4 py-3 flex items-center justify-end" wire:key="{{ 'action-' . $keyData }}">
                        <button wire:click="showViewModal({{ $data->id }})" data-modal-target="{{ $dataModal }}" data-modal-toggle="{{ $dataModal }}" type="button" class="text-white bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:outline-none focus:ring-amber-100 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-amber-400 dark:hover:bg-amber-500 dark:focus:ring-amber-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>

                            <span class="sr-only">Show</span>
                        </button>
                        <button wire:click="showEditModal({{ $data->id }})" data-modal-target="{{ $dataModal }}" data-modal-toggle="{{ $dataModal }}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                            <span class="sr-only">Edit</span>
                        </button>
                        <button wire:click="delete({{ $data->id }})" wire:confirm="Apakah ingin menghapus data ini?" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                            <span class="sr-only">Delete</span>
                        </button>
                    </td>
                </tr>
            @endforeach
        </x-slot:table>
    </x-flowbite.table>
</div>
