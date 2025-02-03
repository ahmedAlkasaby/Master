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
        'admin' => [
            'roles' => 'c,r,u,d',
            'admins' => 'c,r,u,d',
            'categories'=>'c,r,u,d',
            'categoriesCases'=>'c,r,u,d',
            'payments'=>'c,r,u,d',
            'transfers'=>'c,r,u,d',
            'doners' => 'c,r,u,d',
            'donations' => 'c,r,u,d',
            'volunteers'=> 'c,r,u,d',
            'items'=> 'c,r,u,d',
            'purchases'=> 'c,r,u,d',
            'cities'=> 'c,r,u,d',
            'regions'=> 'c,r,u,d',
            'sliders'=> 'c,r,u,d',
            'settings'=> 'c,d,r,u',
            'pages' => 'c,r,u,d',
            'cases' => 'c,r,u,d',
            'impacts'=> 'c,r,u,d',
            'faqs'=> 'c,r,u,d',
            'messages'=>'c,r,u,d',
            // 'profiles'=> 'r,u',
            'storage' => 'r',
            'notifications' => 'r',
        ],

    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        // 's' => 'show',
    ],
];
