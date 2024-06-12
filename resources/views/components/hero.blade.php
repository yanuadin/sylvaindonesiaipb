<div>
    <section id="hero" class="jarallax jarallax-img title-img {{ Route::currentRouteName() == 'home' ? 'bg-jarralax' : 'bg-white' }}">
        <div class="{{ Route::currentRouteName() == 'home' ? 'py-80' : 'py-12'}} xl:px-70 text-center">
            @if(Route::currentRouteName() == 'home')
                <h2 class="font-heading text-5xl sm:text-6xl lg:text-8xl font-thin">Sylva</h2>
            @endif
        </div>
    </section>
</div>
