<x-guest-layout>
    <!-- component -->
    <div class="bg-white dark:bg-gray-900">
        <div class="flex justify-center h-screen">
            <div class="hidden bg-cover lg:block lg:w-2/3" style="background-image: url('{{ asset('image/login_background.jpg') }}')">
                <div class="flex items-center h-full px-20 bg-gray-900 bg-opacity-40">
                    <div>
                        <h2 class="text-4xl font-bold text-white">Sylva Indonesia IPB</h2>

                        <p class="max-w-xl mt-3 text-gray-300">Mewujudkan Sylva Indonesia IPB sebagai <em>“Youth Center of Excellence”</em> dan terwujudnya pengelolaan sumber daya hutan yang lestari, adil, dan demokratis.</p>
                    </div>
                </div>
            </div>

            <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
                <div class="flex-1">
                    <div class="text-center">
                        <h2 class="text-4xl font-bold text-center text-gray-700 dark:text-white">Sylva Indonesia IPB</h2>

                        <p class="mt-3 text-gray-500 dark:text-gray-300">Welcome to our world</p>
                    </div>

                    <div class="mt-8">
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div>
                                <x-label for="username" class="block mb-2 text-sm text-gray-600 dark:text-gray-200" value="{{ __('Username') }}"/>
                                <x-input
                                    type="text"
                                    name="username"
                                    id="username"
                                    :value="old('username')"
                                    required
                                    autofocus
                                    autocomplete="username"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border
                                        border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300
                                        dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400
                                        focus:outline-none focus:ring focus:ring-opacity-40"
                                />
                            </div>

                            <div class="mt-6">
                                <div class="flex justify-between mb-2">
                                    <x-label for="password" class="text-sm text-gray-600 dark:text-gray-200">Password</x-label>
{{--                                    @if (Route::has('password.request'))--}}
{{--                                        <a class="text-sm text-gray-400 focus:text-blue-500 hover:text-blue-500 hover:underline" href="{{ route('password.request') }}">--}}
{{--                                            {{ __('Forgot your password?') }}--}}
{{--                                        </a>--}}
{{--                                    @endif--}}
                                </div>

                                <x-input
                                    type="password"
                                    name="password"
                                    id="password"
                                    required
                                    autocomplete="current-password"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white
                                        border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900
                                        dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400
                                        focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                />
                            </div>

                            <div class="mt-6">
                                <button
                                    class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200
                                        transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:bg-blue-400
                                        focus:ring focus:ring-blue-300 focus:ring-opacity-50"
                                >
                                    {{ __('Log in') }}
                                </button>
                            </div>

                        </form>

                        <p class="mt-6 text-sm text-center text-gray-400">Sign in to access your account</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
