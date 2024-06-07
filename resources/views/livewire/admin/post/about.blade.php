<div>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="mx-auto max-w-screen-xl">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden min-h-85vh">
                <form wire:submit.prevent="storeOrUpdate" class="p-4 md:p-5" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-4">
                            <x-flowbite.label modelName="about" text="Tentang" isRequired="true"/>
                            <x-flowbite.textarea rows="7" modelName="about" placeholder="Masukkan tentang"/>
                        </div>
                        <div class="col-span-4">
                            <x-flowbite.label modelName="history" text="Sejarah" isRequired="true"/>
                            <x-flowbite.textarea rows="7" modelName="history" placeholder="Masukkan sejarah"/>
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
