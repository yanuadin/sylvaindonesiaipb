<div>
    <section id="hero">
        <div class="text-center py-20 px-20">
            <h2 class="font-heading text-5xl sm:text-4xl lg:text-6xl font-thin">Sylva Indonesia IPB</h2>
        </div>
    </section>

    <section id="about-content">
        <div class="container mx-auto px-8 mt-20">
            @if($profile->image)
                <div>
                    <img class="h-auto w-full" src="{{ asset('storage/' . $profile->image) }}" alt="image description">
                </div>
            @endif
            @if($profile->about)
                <div class="mt-20">
                    <p>{{ $profile->about }}</p>
                </div>
            @endif
            @if($profile->history)
                <div class="">
                    <section id="hero">
                        <div class="text-center py-20 px-20">
                            <h2 class="font-heading text-5xl sm:text-4xl lg:text-6xl font-thin">Sejarah</h2>
                        </div>
                    </section>
                    <p>
                        {{ $profile->history }}
                    </p>
                </div>
            @endif
        </div>
    </section>
</div>
