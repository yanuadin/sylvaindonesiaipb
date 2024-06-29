<div>
    <div class="flex">
        <!-- Start Content -->
        <div class="w-3/4">
            <section id="hero">
                <div class="text-center py-20 px-20">
                    <h2 class="font-heading text-5xl sm:text-4xl lg:text-6xl font-thin">{{ $news->title }}</h2>
                    <p class="text-xl xl:px-40 pt-5 text-stone-700"><b>{{ $news->student_name }} | </b> {{ \Carbon\Carbon::parse($news->created_at)->translatedFormat('d F Y') }}</p>
                </div>
            </section>


            @if($news->image)
                <section class="jarallax">
                    <img src="{{ asset('storage/' . $news->image) }}" alt="Image Article" class="px-20">
                </section>
            @endif

            <!-- content Section Starts -->
            <section id="blog-single-content">
                <div class="container mx-auto px-20 banner-content">
                    <div class="my-10 ">
                        {!! $news->content !!}
                    </div>
                </div>
            </section>
        </div>
        <!-- End Content -->

        <!-- Start List News -->
        <div class="w-1/4 py-20 pr-20">
            <h4 class="text-2xl font-normal dark:text-white pb-10">Artikel Lainnya</h4>
            <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($other_news as $news)
                    <li class="py-3 sm:py-4">
                        <div class="flex space-x-4 rtl:space-x-reverse">
                            <div class="flex-shrink-0">
                                <a href="{{ route('inner', $news->slug) }}">
                                    <img class="w-32 h-20" src="{{ $news->image ? asset('storage/' . $news->image) : asset('image/no_image.png') }}" alt="Neil image">
                                </a>
                            </div>
                            <div class="flex-1 min-w-0">
                                <a href="{{ route('inner', $news->slug) }}">
                                    <p class="text-sm font-medium text-gray-900 line-clamp-1 dark:text-white">
                                        {{ $news->title }}
                                    </p>
                                </a>
                                <div class="text-sm text-gray-500 line-clamp-3 dark:text-gray-400">
                                    <div>
                                        {!! $news->content !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- End List News -->
    </div>
</div>
