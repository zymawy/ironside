<?php

return [
    'role_structure' => [
        'superadministrator' => [
            'users'   => 'c,r,u,d',
            'acl'     => 'c,r,u,d',
            'profile' => 'r,u',
            'icon'    => 'user-secret',
            'slug'    => '/dashboard',
            'keyword' => 'dashboard,superadministrator',
        ],
        'administrator' => [
            'users'   => 'c,r,u,d',
            'acl'     => 'c,r,u,d',
            'profile' => 'r,u',
            'icon'    => 'user-secret',
            'slug'    => '/dashboard',
            'keyword' => 'administrator,dashboard',
        ],
        'user' => [
            'profile' => 'r,u',
            'icon'    => 'user',
            'slug'    => '/',
            'keyword' => 'user',
        ],
    ],
    'permission_structure' => [
        'cru_user' => [
            'profile' => 'c,r,u',
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
