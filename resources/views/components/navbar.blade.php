<div>
    <nav class="fixed navbar w-full z-10">
        <div class=" py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between ">
                <div class="flex items-center justify-between">
                    <div class="flex-shrink-0 max-h-10 max-w-10">
                        <a href="{{ route('home') }}"><img class="" src="{{ asset('image/logo_sylva3.png') }}" alt="Sylva IPB"></a>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="flex items-baseline ">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="{{ route('home') }}"
                           class="font-heading uppercase text-base text-black hover:text-gray-500 py-2 px-5"
                           aria-current="page">Home</a>
                        <a href="{{ route('article') }}"
                           class="font-heading uppercase text-base text-black hover:text-gray-500 py-2 px-5">Article</a>
                        <a href="{{ route('about') }}"
                           class="font-heading uppercase text-base text-black hover:text-gray-500 py-2 px-5">About
                            Us</a>
                        <a href="{{ route('album') }}"
                           class="font-heading uppercase text-base text-black hover:text-gray-500 py-2 px-5">Album</a>
                        <div>
                            @if (Route::has('login'))
                                <div class="font-heading uppercase text-base text-black hover:text-gray-500">
                                    @auth
                                        <a href="{{ url('/dashboard') }}"
                                           class="font-heading uppercase text-base text-black hover:text-gray-500 py-2 ps-5">Dashboard</a>
                                    @else
                                        <a href="{{ route('login') }}"
                                           class="font-heading uppercase text-base text-black hover:text-gray-500 py-2 ps-5">Log
                                            in</a>
                                    @endauth
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="-mr-2 flex md:hidden mobile-menu-button">
                    <!-- Mobile menu button -->
                    <button type="button"
                            class="relative inline-flex items-center justify-center rounded-md  p-2 text-black hover:bg-slate-700 hover:text-white"
                            aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <!-- Menu open: "hidden", Menu closed: "block" -->
                        <svg class="open-icon block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <!-- Menu open: "block", Menu closed: "hidden" -->
                        <svg class="close-icon hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="md:hidden hidden bg-white" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2 h-screen sm:px-3">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="{{ route('home') }}"
                   class="font-heading block uppercase text-base text-black hover:text-gray-500 p-2"
                   aria-current="page">Home</a>
                <a href="{{ route('article') }}"
                   class="font-heading block uppercase text-base text-black hover:text-gray-500 p-2 ">Article</a>
                <a href="{{ route('home') }}"
                   class="font-heading block uppercase text-base text-black hover:text-gray-500 p-2 ">About
                    Us</a>
                <div>
                    @if (Route::has('login'))
                        <div class="font-heading uppercase text-base text-black hover:text-gray-500 py-2 ps-5">
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                   class="font-heading uppercase text-base text-black hover:text-gray-500 py-2 ps-5">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}"
                                   class="font-heading uppercase text-base text-black hover:text-gray-500 py-2 ps-5">Log
                                    in</a>
                            @endauth
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </nav>
</div>
