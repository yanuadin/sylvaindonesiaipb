<div>
    <section id="hero">
        <div class="text-center pt-20 pb-40 px-20">
            <h2 class="font-heading text-5xl sm:text-4xl lg:text-6xl font-thin">Wonderful Gallery of Sylva Indonesia IPB</h2>
        </div>
    </section>

    <section id="gallery">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach([1,2,3,4,5,6,7,8,9] as $value)
                    <div>
                        <img class="max-h-80 w-full rounded-lg"
                             src="{{ asset('image/blog'. $value .'.png') }}" alt="">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
