<div>
    <section id="hero">
        <div class="text-center pt-20 px-20">
            <h2 class="font-heading text-5xl sm:text-4xl lg:text-6xl font-thin">Kabar Sylva</h2>
        </div>
    </section>

    <section id="blog-card">
        <div class="container mx-auto pt-28 px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-7">
                @foreach($sylva_news as $news)
                    <div class="blog-post py-10">
                        <div class="image-zoom ">
                            <a href="{{ route('inner', $news->slug) }}" class="blog-img"><img
                                    src="{{ $news->image ? asset('storage/' . $news->image) : asset('image/no_image.png') }}" alt="Article Image" class="h-72 w-full"></a>
                        </div>
                        <div class="pt-8">
                            <span class="blog-date uppercase"><b>{{ $news->student_name }} | </b> {{ \Carbon\Carbon::parse($news->created_at)->translatedFormat('d F Y') }}</span>
                        </div>
                        <div class="">
                            <h3 class="py-5">
                                <a href="{{ route('inner', $news->slug) }}" class="font-heading font-thin text-2xl hover:text-gray-500 line-clamp-1">
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
        </div>
    </section>
</div>
