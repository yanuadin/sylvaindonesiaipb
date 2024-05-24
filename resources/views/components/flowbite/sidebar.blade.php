<?php
$current_route_name = Route::currentRouteName();
$menus = [];
include base_path('resources/views/components/flowbite/list-menu.php');
?>

<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidenav"
    id="drawer-navigation"
>
    <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
        <ul class="space-y-2">
            @foreach($menus as $menu)
                @if(empty($menu['childs']))
                    <li>
                        <a
                            href="{{ route($menu['route_name']) }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ $current_route_name === $menu['route_name'] ? 'bg-gray-200' : '' }}"
                        >
                            {!! $menu['icon'] !!}
                            <span class="ml-3">{{ $menu['name'] }}</span>
                        </a>
                    </li>
                @else
                    <li>
                        <button
                            type="button"
                            class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="{{ $menu['control_name'] }}"
                            data-collapse-toggle="{{ $menu['control_name'] }}"
                            aria-expanded="{{ checkIsActiveSubMenu($menu, $current_route_name) ? 'true' : 'false' }}"
                        >
                            {!! $menu['icon'] !!}
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">{{ $menu['name'] }}</span>
                            <svg
                                aria-hidden="true"
                                class="w-6 h-6"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                        </button>
                        <ul id="{{ $menu['control_name'] }}" class="{{ checkIsActiveSubMenu($menu, $current_route_name) ? '' : 'hidden' }} py-2 space-y-2">
                            @foreach($menu['childs'] as $child)
                                <li>
                                    <a
                                        href="{{ route($child['route_name']) }}"
                                        class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ $current_route_name === $child['route_name'] ? 'bg-gray-200' : '' }}"
                                    >
                                        {{ $child['name'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
    <div
        class="absolute bottom-0 left-0 justify-center p-4 space-x-4 w-full lg:flex bg-white dark:bg-gray-800 z-20"
    >
        <p class="mb-4 text-sm text-center text-gray-500 dark:text-gray-400 sm:mb-0">
            &copy; 2024 <span class="font-bold" target="_blank">Sylva Indonesia IPB</span>
        </p>

    </div>
</aside>
