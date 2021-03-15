<?php
// Aside menu

return [

    'items' => [
        // Dashboard
        [
            'title' => 'Galleria',
            'root' => true,
            'icon' => 'assets/media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => 'admin.dashboard',
            'new-tab' => false,
        ],

        // Admins & Roles & Permissions & Users
        [
            'section' => 'Custom',
        ],
        [
            'title' => 'admin.users_management',
            'icon' => 'assets/media/svg/icons/Communication/Group.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'admin.admins',
                    'bullet' => 'dot',
                    'submenu' => [
                        [
                            'title' => 'admin.all_admins',
                            'page' => 'admin.admins.index',
                            'permission' => 'list admins',
                        ],
                        [
                            'title' => 'admin.new_admin',
                            'page' => 'admin.admins.create',
                            'permission' => 'add admins',
                        ]
                    ]
                ],
                [
                    'title' => 'admin.users',
                    'bullet' => 'dot',
                    'submenu' => [
                        [
                            'title' => 'admin.all_users',
                            'page' => 'admin.users.index',
                            'permission' => 'list users',
                        ],
                        [
                            'title' => 'admin.new_user',
                            'page' => 'admin.users.create',
                            'permission' => 'add users',
                        ]
                    ]
                ],
                [
                    'title' => 'admin.roles',
                    'bullet' => 'dot',
                    'submenu' => [
                        [
                            'title' => 'admin.all_roles',
                            'page' => 'admin.roles.index',
                            'permission' => 'list roles',
                        ],
                        [
                            'title' => 'admin.new_role',
                            'page' => 'admin.roles.create',
                            'permission' => 'add roles',
                        ]
                    ]
                ]
            ]
        ],

        // Categories & Products
        [
            'section' => 'Custom',
        ],
        [
            'title' => 'admin.catalog_management',
            'icon' => 'assets/media/svg/icons/Clothes/Shirt.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'admin.categories',
                    'bullet' => 'dot',
                    'submenu' => [
                        [
                            'title' => 'admin.all_categories',
                            'page' => 'admin.categories.index',
                            'permission' => 'list categories',

                        ],
                        [
                            'title' => 'admin.new_category',
                            'page' => 'admin.categories.create',
                            'permission' => 'add categories',

                        ]
                    ]
                ],
                [
                    'title' => 'admin.products',
                    'bullet' => 'dot',
                    'submenu' => [
                        [
                            'title' => 'admin.all_products',
                        ],
                        [
                            'title' => 'admin.most_sell_products',
                        ],
                        [
                            'title' => 'admin.new_product',
                        ]
                    ]
                ]
            ]
        ],
    ]
];
