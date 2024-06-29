<div>
    <section id="hero">
        <div class="text-center pt-20 pb-40 px-20">
            <h2 class="font-heading text-5xl sm:text-4xl lg:text-6xl font-thin">Kabar Sylva</h2>
        </div>
    </section>

    <section id="blog-card">
        <div class="container mx-auto px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-7">
                @foreach($sylva_news as $news)
                    <div class="blog-post py-10">
                        <div class="image-zoom ">
                            <a href="{{ route('inner', $news->slug) }}" class="blog-img"><img
                                    src="{{ $news->image ? asset('storage/' . $news->image) : asset('image/no_image.png') }}"
                                    alt="Article Image" class="h-72 w-full"></a>
                        </div>
                        <div class="pt-8">
                            <span class="blog-date uppercase"><b>{{ $news->student_name }} | </b> {{ \Carbon\Carbon::parse($news->created_at)->translatedFormat('d F Y') }}</span>
                        </div>
                        <div class="">
                            <h3 class="py-5">
                                <a href="{{ route('inner', $news->slug) }}"
                                   class="font-heading font-thin text-2xl hover:text-gray-500 line-clamp-1">
                                    {{ $news->title }}
                                </a>
                            </h3>
                            <div class="line-clamp-3 mb-10 h-18">
                                {!! $news->content !!}
                            </div>
                            <a href="{{ route('inner', $news->slug) }}"
                               class="font-heading text-sm font-normal py-4 px-8 bg-transparent hover:bg-black text-black hover:text-white border-black border-2 hover:border-transparent rounded-full transition duration-700 ease-in-out">
                                Read More
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-center mt-10">
                <?php
                $left_right_count = 3;
                $current_page = $sylva_news->currentPage();
                $last_page = $sylva_news->lastPage();
                $start = max($current_page - $left_right_count, 1);
                $end = min($current_page + $left_right_count, $last_page);
                ?>
                <div class="px-3 pt-1">
                    <a href="{{ $sylva_news->url(1) }}" class="blog-swipe {{ $sylva_news->onFirstPage() ? 'disabled-button' : ''}}">
                        <iconify-icon class="blog-icon" icon="ic:round-arrow-back"></iconify-icon>
                    </a></div>
                @for($i = $start; $i <= $end; $i++)
                    <div class="px-3 {{ $i === $current_page ? 'active disabled-button' : '' }}">
                        <a href="{{ $sylva_news->url($i) }}" class="blog-swipe {{ $i === $current_page ? 'active' : '' }}">{{ $i }}</a>
                    </div>
                @endfor
                <div class="px-3 pt-1">
                    <a href="{{ $sylva_news->url($sylva_news->lastPage()) }}" class="blog-swipe {{ $sylva_news->onLastPage() ? 'disabled-button' : ''}}">
                        <iconify-icon class="blog-icon" icon="ic:round-arrow-forward"></iconify-icon>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
