<div>
    <div class="flex justify-between">
        <div class="w-full mr-2 text-center p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-col items-center justify-center">
                <dt class="mb-2 text-3xl md:text-4xl font-extrabold">{{ $sylva_news['count'] }}</dt>
                <dd class="font-normal text-gray-500 dark:text-gray-400">Sylva News</dd>
            </div>
            <a href="{{ route('admin.post.sylva-news') }}" class="mt-2 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Read more
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>

        <div class="w-full mx-2 text-center p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-col items-center justify-center">
                <dt class="mb-2 text-3xl md:text-4xl font-extrabold">{{ $sylva_discussion['count'] }}</dt>
                <dd class="font-normal text-gray-500 dark:text-gray-400">Sylva Discussion</dd>
            </div>
            <a href="{{ route('admin.series.sylva-discussion') }}" class="mt-2 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Read more
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>

        <div class="w-full ml-2 text-center p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-col items-center justify-center">
                <dt class="mb-2 text-3xl md:text-4xl font-extrabold">{{ $sylva_training['count'] }}</dt>
                <dd class="font-normal text-gray-500 dark:text-gray-400">Sylva Training</dd>
            </div>
            <a href="{{ route('admin.series.sylva-training') }}" class="mt-2 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Read more
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
    </div>

    <!-- Start Sylva Discussion -->
    <section class="mt-4 bg-gray-50 dark:bg-gray-900">
        <div class="mx-auto max-w-screen-xl">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            Sylva Discussion
                            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">10 Data terakhir</p>
                        </caption>
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">No.</th>
                                <th scope="col" class="px-4 py-3">Tag</th>
                                <th scope="col" class="px-4 py-3">Isi</th>
                                <th scope="col" class="px-4 py-3">Status</th>
                                <th scope="col" class="px-4 py-3">Terakhir Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sylva_discussion['top10'] as $keyDiscussion => $discussion)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-3 w-16">{{ $keyDiscussion + 1 }}</td>
                                    <td class="px-4 py-3">
                                        @foreach($discussion['tags'] as $tag)
                                            <div class="mb-2"><span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $tag['name'] }}</span></div>
                                        @endforeach
                                    </td>
                                    <td class="px-4 py-3">
                                        <h5 class="text-xl font-bold dark:text-white">{{ $discussion['title'] }}</h5>
                                        <div>{!! $discussion['content'] !!}</div>
                                    </td>
                                    <td class="px-4 py-3">{{ $discussion['status'] === 'public' ? 'Publik' : 'Privat' }}</td>
                                    <td class="px-4 py-3">{{ \Carbon\Carbon::create($discussion['updated_at'])->format('j/n/Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- End Sylva Discussion -->

    <!-- Start Sylva Training -->
    <section class="mt-4 bg-gray-50 dark:bg-gray-900">
        <div class="mx-auto max-w-screen-xl">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            Sylva Training
                            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">10 Data terakhir</p>
                        </caption>
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">No.</th>
                            <th scope="col" class="px-4 py-3">Tag</th>
                            <th scope="col" class="px-4 py-3">Isi</th>
                            <th scope="col" class="px-4 py-3">Status</th>
                            <th scope="col" class="px-4 py-3">Terakhir Update</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sylva_training['top10'] as $keyTraining => $training)
                            <tr class="border-b dark:border-gray-700">
                                <td class="px-4 py-3 w-16">{{ $keyTraining + 1 }}</td>
                                <td class="px-4 py-3">
                                    @foreach($training['tags'] as $tag)
                                        <div class="mb-2"><span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $tag['name'] }}</span></div>
                                    @endforeach
                                </td>
                                <td class="px-4 py-3">
                                    <h5 class="text-xl font-bold dark:text-white">{{ $training['title'] }}</h5>
                                    <div>{!! $training['content'] !!}</div>
                                </td>
                                <td class="px-4 py-3">{{ $training['status'] === 'public' ? 'Publik' : 'Privat' }}</td>
                                <td class="px-4 py-3">{{ \Carbon\Carbon::create($training['updated_at'])->format('j/n/Y') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- End Sylva Discussion -->
</div>
