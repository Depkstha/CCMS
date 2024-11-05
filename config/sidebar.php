<?php
return [
    [
        'text' => 'Dashboard',
        'url' => 'dashboard',
        'icon' => 'ri-home-4-line',
    ],

    [
        'text' => 'User Management',
        'icon' => 'ri-user-settings-line',
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
        'icon' => 'ri-settings-4-line',
        'module' => 'CCMS',
        // 'can' => ['setting.index'],
    ],

    [
        'text' => 'Menu',
        'url' => 'menu',
        'icon' => 'ri-menu-line',
        'module' => 'CCMS',
        // 'can' => ['setting.index'],
    ],

    [
        'text' => 'Page',
        'url' => 'page',
        'icon' => 'ri-pages-line',
        'module' => 'CCMS',
        // 'can' => ['setting.index'],
    ],

    [
        'text' => 'Slider',
        'url' => 'slider',
        'icon' => 'ri-slideshow-3-line',
        'module' => 'CCMS',
        // 'can' => ['setting.index'],
    ],

    [
        'text' => 'Testimonial',
        'url' => 'testimonial',
        'icon' => 'ri-feedback-line',
        'module' => 'CCMS',
        // 'can' => ['setting.index'],
    ],

    [
        'text' => 'Partner',
        'url' => 'partner',
        'icon' => 'ri-hand-heart-line',
        'module' => 'CCMS',
        // 'can' => ['setting.index'],
    ],

    [
        'text' => 'Service',
        'url' => 'service',
        'icon' => 'ri-customer-service-2-line',
        'module' => 'CCMS',
        // 'can' => ['setting.index'],
    ],

    [
        'text' => 'Team',
        'url' => 'team',
        'icon' => 'ri-team-line',
        'module' => 'CCMS',
        // 'can' => ['setting.index'],
    ],

    [
        'text' => 'Blog',
        'icon' => 'ri-newspaper-line',
        'module' => 'CCMS',
        'submenu' => [
            [
                'url' => 'category',
                'text' => 'Blog Category',
                // 'can' => ['user.index'],
            ],
            [
                'url' => 'blog',
                'text' => 'Blog',
                // 'can' => ['user.index'],
            ],
        ],
    ],

    [
        'text' => 'Study Abroad',
        'icon' => ' ri-earth-line',
        'module' => 'CCMS',
        'submenu' => [
            [
                'url' => 'country',
                'text' => 'Destination',
                // 'can' => ['user.index'],
            ],
            [
                'url' => 'institution',
                'text' => 'Representative Institution',
                // 'can' => ['user.index'],
            ],
        ],
    ],

    [
        'text' => 'Gallery',
        'icon' => ' ri-camera-line',
        'module' => 'CCMS',
        'submenu' => [
            [
                'url' => 'gallery-category',
                'text' => 'Gallery Category',
                // 'can' => ['user.index'],
            ],
            [
                'url' => 'gallery',
                'text' => 'Gallery',
                // 'can' => ['user.index'],
            ],
        ],
    ],

    [
        'text' => 'FAQ',
        'icon' => 'ri-questionnaire-line',
        'module' => 'CCMS',
        'submenu' => [
            [
                'url' => 'faq-category',
                'text' => 'FAQ Category',
                // 'can' => ['user.index'],
            ],
            [
                'url' => 'faq',
                'text' => 'FAQ',
                // 'can' => ['user.index'],
            ],
        ],
    ],
];
