<?php
return [
    [
        'text' => 'Dashboard',
        'url' => 'dashboard',
        'icon' => 'ri-home-fill text-primary',
    ],

    // [
    //     'text' => 'Lead/ Registrations',
    //     'icon' => 'ri-home-2-fill text-dark',
    //     'module' => 'Lead',
    //     'submenu' => [
    //         [
    //             'text' => 'Registration',
    //             'url' => 'admin/lead',
    //             'icon' => 'ri-parent-fill',
    //             'can' => ['lead.index'],
    //         ],
    //         [
    //             'text' => 'Campaign',
    //             'url' => 'admin/lead/campaign-list',
    //             'icon' => 'ri-coin-fill',
    //             'can' => ['lead.campaign'],
    //         ],
    //         [
    //             'text' => 'Followup',
    //             'url' => 'admin/followup',
    //             'icon' => 'ri-coin-fill',
    //             'can' => ['followup.index'],
    //         ],
    //     ],
    // ],

    // [
    //     'url' => 'admin/country',
    //     'text' => 'Countries',
    //     'icon' => 'ri-earth-fill text-success',
    //     'can' => ['country.index'],
    //     'module' => 'Admin',
    // ],

    [
        'text' => 'User Management',
        'icon' => 'ri-user-2-fill',
        'module' => 'User',
        'submenu' => [
            [
                'url' => 'user',
                'text' => 'User Credentials',
                // 'can' => ['user.index'],
            ],
        ],
    ],

    [
        'text' => 'Setting',
        'url' => 'setting',
        'icon' => 'ri-settings-2-fill',
        // 'can' => ['setting.index'],
        'module' => 'CCMS',
    ],
];
