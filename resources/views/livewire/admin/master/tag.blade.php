<div>
    <x-flowbite.table
        :table-head="$tableHead"
        :datas="$tags"
        :data-modal="$dataModal"
        :search="$search"
    >
        <x-slot:button>
            <button data-modal-target="{{ $dataModal }}" data-modal-toggle="{{ $dataModal }}" type="button" class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                </svg>
                Tambah Tag
            </button>
            <!-- Form Modal -->
            <x-flowbite.modal
                :title-modal="$titleModal"
                :data-modal="$dataModal"
            >
                <x-slot:content-modal>
                    <form wire:submit.prevent="{{ $submitMethod }}" class="p-4 md:p-5">
                        @csrf
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <x-flowbite.label modelName="code" text="Kode" isRequired="true"/>
                                <x-flowbite.input type="text" modelName="code" placeholder="Masukkan kode" :is-disabled="$isViewMode"/>
                            </div>
                            <div class="col-span-2">
                                <x-flowbite.label modelName="name" text="Nama Tag" isRequired="true"/>
                                <x-flowbite.input type="text" modelName="name" placeholder="Masukkan nama tag" :is-disabled="$isViewMode"/>
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
    </x-flowbite.table>
</div>
