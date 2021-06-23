<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'super_admin' => [
            'users' => 'c,r,u,d',
            'vendors' => 'c,r,u,d',
            'moderators' => 'c,r,u,d',
            'shop_managers' => 'c,r,u,d',
            'products' => 'c,r,u,d',
            'main_categories' => 'c,r,u,d',
            'orders' => 'c,r,u,d',
            'payments' => 'c,r,u,d',
            'profile' => 'r,u',
            'site_settings' => 'c,r,u',
            'pages' => 'c,r,u,d',
            'blogs' => 'c,r,u,d',
            'tags' => 'c,r,u,d',
            'currencies' => 'c,r,u,d',
            'countries' => 'c,r,u,d',
            'cities' => 'c,r,u,d',
        ],
        'admin' => [
            'users' => 'c,r,u,d',
            'vendors' => 'c,r,u,d',
            'moderators' => 'c,r,u,d',
            'shop_managers' => 'c,r,u,d',
            'products' => 'c,r,u,d',
            'main_categories' => 'c,r,u,d',
            'orders' => 'c,r,u,d',
            'payments' => 'c,r,u,d',
            'profile' => 'r,u',
            'site_settings' => 'r,u',
            'pages' => 'c,r,u,d',
            'blogs' => 'c,r,u,d',
            'tags' => 'c,r,u,d',
            'currencies' => 'c,r,u,d',
            'countries' => 'c,r,u,d',
            'cities' => 'c,r,u,d',
        ],
        'user' => [
            'profile' => 'c,r,u',
            'cart' => 'c,r,u,d',
            'wishlist' => 'c,r,u,d',
            'pages' => 'r',
            'blogs' => 'r',
        ],
        'shop_manager' => [
            'vendors' => 'c,r,u,d',
            'products' => 'c,r,u,d',
            'main_categories' => 'c,r,u,d',
            'orders' => 'c,r,u,d',
            'site_settings' => 'r',
            'pages' => 'c,r,u,d',
            'blogs' => 'c,r,u,d',
            'tags' => 'c,r,u,d',
            'currencies' => 'c,r,u,d',
            'countries' => 'c,r,u,d',
            'cities' => 'c,r,u,d',
        ],
        'vendor' => [
            'products' => 'c,r,u,d',
            'main_categories' => 'c,r,u',
            'orders' => 'c,r,u',
            'pages' => 'r',
            'blogs' => 'r',
            'tags' => 'r',
            'currencies' => 'r',
            'countries' => 'r',
            'cities' => 'r',
        ],
        'moderator' => [
            'users' => 'r',
            'vendors' => 'r',
            'products' => 'r',
            'main_categories' => 'r',
            'orders' => 'r',
            'site_settings' => 'r',
            'pages' => 'r',
            'blogs' => 'r',
            'tags' => 'r',
            'currencies' => 'r',
            'countries' => 'r',
            'cities' => 'r',
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
