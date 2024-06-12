<div>
    <section id="hero">
        <div class="text-center pt-20 px-20">
            <h2 class="font-heading text-5xl sm:text-4xl lg:text-6xl font-thin">Kabar Sylva</h2>
        </div>
    </section>

    <section id="blog-card">
        <div class="container mx-auto pt-28 px-8">
            <div class="columns-1 md:columns-2 lg:columns-3 gap-7 px-5 lg:px-0">
                @foreach([1,2,3,4,5,6] as $value)
                    <div class="blog-post py-10">
                        <div class="image-zoom ">
                            <a href="{{ route('inner') }}" class="blog-img"><img
                                    src="{{ asset('image/blog'. $value .'.png') }}" alt="" class=""></a>
                        </div>
                        <div class="pt-8">
                            <span class="blog-date uppercase">in <b>Travel Tips</b> on 12th Jan 2023</span>
                        </div>
                        <div class="">
                            <h3 class="py-5">
                                <a href="{{ route('inner') }}" class="font-heading font-thin text-2xl hover:text-gray-500">
                                    I am alone, and feel the charm of existence created for the bliss
                                </a>
                            </h3>
                            <p class="pb-10">I am so happy, my dear friend, so absorbed in the exquisite sense of mere
                                tranquil existence, that I neglect my talents. I should be incapable of drawing since
                            </p>
                            <a href="{{ route('inner') }}"
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
