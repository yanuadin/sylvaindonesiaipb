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
          <path fill-rule="evenodd" d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0 0 16.5 9h-1.875a1.875 1.875 0 0 1-1.875-1.875V5.25A3.75 3.75 0 0 0 9 1.5H5.625ZM7.5 15a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 7.5 15Zm.75 2.25a.75.75 0 0 0 0 1.5H12a.75.75 0 0 0 0-1.5H8.25Z" clip-rule="evenodd" />
          <path d="M12.971 1.816A5.23 5.23 0 0 1 14.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 0 1 3.434 1.279 9.768 9.768 0 0 0-6.963-6.963Z" />
        </svg>
        ',
        'childs' => [
            [
                'name' => 'Sylva News',
                'route_name' => 'admin.post.sylva-news',
                'control_name' => 'dropdown-post',
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
