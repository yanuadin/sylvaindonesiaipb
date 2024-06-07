<div>
    <x-flowbite.table
        :tableHead="$tableHead"
        :datas="$articles"
        :dataModal="$dataModal"
        :search="$search"
        isCustom="true"
    >
        <x-slot:button>
            <button data-modal-target="{{ $dataModal }}" data-modal-toggle="{{ $dataModal }}" type="button" class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                </svg>
                Tambah Diskusi Sylva
            </button>

            <!-- Form Modal -->
            <x-flowbite.modal
                :title-modal="$titleModal"
                :data-modal="$dataModal"
                max-width="max-w-7xl"
            >
                <x-slot:content-modal>
                    <form wire:submit.prevent="{{ $submitMethod }}" class="p-4 md:p-5" enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-4">
                                <x-flowbite.label modelName="title" text="Judul" isRequired="true"/>
                                <x-flowbite.input type="text" modelName="title" placeholder="Masukkan judul" :is-disabled="$isViewMode"/>
                                @error('slug') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-span-4">
                                <x-flowbite.label modelName="content" text="Konten" isRequired="true"/>
                                @if($isViewMode)
                                    <div id="content" rows="17" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled readonly>{!! $content !!}</div>
                                @else
                                    <x-flowbite.editor wire:model="content" :isDisabled="!$isViewMode"/>
                                    @error('content') <span class="text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                                @endif
                            </div>
                            <div class="col-span-4">
                                <x-flowbite.label modelName="tags" text="Tag"/>
                                @foreach($tags as $key => $tag)
                                    <span wire:key="badge-{{ $key }}" id="badge-dismiss-default" class="mb-3 inline-flex items-center px-2 py-1 me-2 text-sm font-medium text-blue-800 bg-blue-100 rounded dark:bg-blue-900 dark:text-blue-300">
                                        {{ is_array($tag) ? $tag['name'] : self::getTextSelectedTags($tag) }}
                                        @if(!$isViewMode)
                                            <button wire:click="removeTag({{ $key }})" type="button" class="inline-flex items-center p-1 ms-2 text-sm text-blue-400 bg-transparent rounded-sm hover:bg-blue-200 hover:text-blue-900 dark:hover:bg-blue-800 dark:hover:text-blue-300" data-dismiss-target="#badge-dismiss-default" aria-label="Remove">
                                                <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                            <span class="sr-only">Remove badge</span>
                                            </button>
                                        @endif
                                    </span>
                                @endforeach
                                @if(!$isViewMode)
                                    <select wire:model="selectedTag" wire:change="addTag" id="tags" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>Pilih tags</option>
                                        @foreach($tagList as $option)
                                            <option value="{{ $option['code'] }}">{{ $option['name'] }}</option>
                                        @endforeach
                                    </select>
                                @endif
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
                                    <x-flowbite.label modelName="image" text="Gambar"/>
                                    <input wire:model="image" class="block w-full text-sm border {{ $errors->has('image') ? 'border-red-500 text-red-900' : 'text-gray-900 border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400'}} rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="image" type="file">
                                    @error('image') <span class="text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                                </div>
                            @endif
                            <div class="col-span-1">
                                <x-flowbite.label modelName="status" text="Publik"/>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" wire:model="status" value="" class="sr-only peer" {{ $status === 'public' ? 'checked' : '' }} {{ $isViewMode ? 'disabled' : '' }}>
                                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                </label>
                            </div>
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

        <x-slot:filter>
            <div class="flex items-center space-x-1 w-full md:w-auto">
                <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                        class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                        type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                         class="h-4 w-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                              clip-rule="evenodd" />
                    </svg>
                    Filter
                    <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                    </svg>
                </button>
                <div id="filterDropdown"
                     class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Filter Status -->
                    <div class="mb-2">
                        <x-flowbite.label modelName="filterStatus" text="Status"/>
                        <x-flowbite.filter modelName="filterStatus" :selectedValue="$filterStatus" :options="$statusList"/>
                    </div>

                    <!-- Filter Tag -->
                    <div>
                        <x-flowbite.label modelName="filterTag" text="Tag"/>
                        <x-flowbite.filter modelName="filterTag" :selectedValue="$filterTag" :options="$tagList" value="code" text="name"/>
                    </div>
                </div>
            </div>
        </x-slot:filter>

        <x-slot:table>
            @foreach($articles as $keyData => $data)
                <tr class="border-b dark:border-gray-700">
                    <td class="px-4 py-3 w-16">{{ $articles->firstItem() + $keyData }}</td>
                    <td class="px-4 py-3">{{ $data['title'] }}</td>
                    <td class="px-4 py-3">
                        @foreach($data['tags'] as $tag)
                            <div class="mb-2"><span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $tag['name'] }}</span></div>
                        @endforeach
                    </td>
                    <td class="px-4 py-3">{{ $data['status'] === 'public' ? 'Publik' : 'Privat' }}</td>
                    <td class="px-4 py-3">{{ \Carbon\Carbon::create($data['updated_at'])->format('j/n/Y') }}</td>
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
