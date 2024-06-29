<div>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="mx-auto max-w-screen-xl">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden min-h-85vh">
                <form wire:submit.prevent="storeOrUpdate" class="p-4 md:p-5" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-4">
                            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400"><span class="font-medium">Terakhir Update : </span>{{ $updated_at ? \Carbon\Carbon::create($updated_at)->format('j/n/Y') : 'Belum dibuat' }}</p>
                        </div>
                        <div class="col-span-4">
                            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400"><span class="font-medium">Oleh : </span>{{ $updated_by ? $updated_by : 'Belum dibuat' }}</p>
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
                        <div class="col-span-4">
                            <x-flowbite.label modelName="about" text="Tentang" isRequired="true"/>
                            <x-flowbite.textarea rows="10" modelName="about" placeholder="Masukkan tentang"/>
                        </div>
                        <div class="col-span-4">
                            <x-flowbite.label modelName="history" text="Sejarah" isRequired="true"/>
                            <x-flowbite.textarea rows="10" modelName="history" placeholder="Masukkan sejarah"/>
                        </div>
                        <div class="col-span-2">
                            <x-flowbite.label modelName="contact" text="Kontak"/>
                            <x-flowbite.input type="text" modelName="contact" placeholder="Masukkan kontak"/>
                        </div>
                        <div class="col-span-2">
                            <x-flowbite.label modelName="image" text="Gambar"/>
                            <input wire:model="image" class="block w-full text-sm border {{ $errors->has('image') ? 'border-red-500 text-red-900' : 'text-gray-900 border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400'}} rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="image" type="file">
                            @error('image')
                                <span class="text-sm text-red-600 dark:text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-center items-center p-4 md:p-5 rounded-b dark:border-gray-600">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
