<?php
/**[
    'name' => '',
    'route_name' => '',
    'control_name' => '',
    'icon' => '',
    'childs' => [],
],
 * @description : template menus
 **/
$menus = [
    [
        'name' => 'Dashboard',
        'route_name' => 'admin.dashboard',
        'control_name' => 'dashboard',
        'icon' => '
          <svg
            aria-hidden="true"
            class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
          </svg>
        ',
        'childs' => [],
    ],
    [
        'name' => 'Post',
        'route_name' => '',
        'control_name' => 'dropdown-post',
        'icon' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white">
          <path fill-rule="evenodd" d="M4.125 3C3.089 3 2.25 3.84 2.25 4.875V18a3 3 0 0 0 3 3h15a3 3 0 0 1-3-3V4.875C17.25 3.839 16.41 3 15.375 3H4.125ZM12 9.75a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5H12Zm-.75-2.25a.75.75 0 0 1 .75-.75h1.5a.75.75 0 0 1 0 1.5H12a.75.75 0 0 1-.75-.75ZM6 12.75a.75.75 0 0 0 0 1.5h7.5a.75.75 0 0 0 0-1.5H6Zm-.75 3.75a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5H6a.75.75 0 0 1-.75-.75ZM6 6.75a.75.75 0 0 0-.75.75v3c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-3A.75.75 0 0 0 9 6.75H6Z" clip-rule="evenodd" />
          <path d="M18.75 6.75h1.875c.621 0 1.125.504 1.125 1.125V18a1.5 1.5 0 0 1-3 0V6.75Z" />
        </svg>
        ',
        'childs' => [
            [
                'name' => 'Kabar Sylva',
                'route_name' => 'admin.post.sylva-news',
                'control_name' => 'dropdown-post',
                'icon' => '',
            ],
            [
                'name' => 'Album',
                'route_name' => 'admin.post.album',
                'control_name' => 'dropdown-post',
                'icon' => '',
            ]
        ],
    ],
    [
        'name' => 'Series',
        'route_name' => '',
        'control_name' => 'dropdown-series',
        'icon' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white">
          <path d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
        </svg>
        ',
        'childs' => [
            [
                'name' => 'Diskusi Sylva',
                'route_name' => 'admin.series.sylva-discussion',
                'control_name' => 'dropdown-series',
                'icon' => '',
            ],
            [
                'name' => 'Pelatihan Sylva',
                'route_name' => 'admin.series.sylva-training',
                'control_name' => 'dropdown-series',
                'icon' => '',
            ]
        ],
    ],
    [
        'name' => 'Master',
        'route_name' => '',
        'control_name' => 'dropdown-master',
        'icon' => '
          <svg
            aria-hidden="true"
            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path
              fill-rule="evenodd"
              d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
              clip-rule="evenodd"
            ></path>
          </svg>
        ',
        'childs' => [
            [
                'name' => 'User',
                'route_name' => 'admin.master.user',
                'control_name' => 'dropdown-master',
                'icon' => ''
            ],
            [
                'name' => 'Tag',
                'route_name' => 'admin.master.tag',
                'control_name' => 'dropdown-tag',
                'icon' => ''
            ]
        ]
    ],
];

function checkIsActiveSubMenu($menu, $current_route_name): bool
{
    if(!empty($menu['childs'])) {
        $list_menu = array_map(fn ($value) =>  $value['route_name'], $menu['childs']);
        return in_array($current_route_name, $list_menu);
    } else
        return false;
}
