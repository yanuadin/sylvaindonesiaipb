@props(['profile' => null])

<div>
    <section id="footer" class="relative px-8">

        <div class="pattern-overlay pattern-left absolute -z-10">
            <img src="{{ asset('image/leaf-img-pattern-left.png') }}" alt="pattern" class="max-h-72">
        </div>
        <div class="pattern-overlay pattern-right absolute bottom-0 right-0 -z-10">
            <img src="{{ asset('image/leaf-img-pattern-right.png') }}" alt="pattern" class="max-h-72">
        </div>

        <div class="container mx-auto footer-container py-20 px-5 lg:px-0">
            <footer>
                <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
                    <div class="sm:flex sm:items-center sm:justify-between">
                        <a href="{{ route('home') }}"
                           class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                            <img src="{{ asset('image/logo_sylva3.png') }}" class="h-8" alt="Sylva IPB" />
                            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Sylva Indonesia IPB</span>
                        </a>
                        <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                            <li>
                                <a href="#" class="hover:underline me-4 md:me-6">Instagram</a>
                            </li>
                            <li>
                                <a href="#" class="hover:underline me-4 md:me-6">Tiktok</a>
                            </li>
                            <li>
                                <a href="#" class="hover:underline me-4 md:me-6">Facebook</a>
                            </li>
                            @if($profile?->contact)
                                <li>
                                    <a href="#" class="hover:underline me-4 md:me-6">{{ $profile->contact }}</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                    <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">&copy; 2024 <span class="font-bold" target="_blank">Sylva Indonesia IPB</span></span>
                </div>
            </footer>
        </div>
    </section>
</div>
