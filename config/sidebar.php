<?php
return [
    [
        'text' => 'Dashboard',
        'url' => 'admin/dashboard',
        'icon' => 'ri-home-4-line',
    ],

    [
        'text' => 'User Management',
        'icon' => 'ri-user-settings-line',
        'module' => 'User',
        'submenu' => [
            [
                'url' => 'admin/user',
                'text' => 'User Credentials',
                // 'can' => ['user.index'],
            ],
        ],
    ],

    [
        'text' => 'Setting',
        'url' => 'admin/setting',
        'icon' => 'ri-settings-4-line',
        'module' => 'CCMS',
        // 'can' => ['setting.index'],
    ],

    [
        'text' => 'Menu',
        'url' => 'admin/menu',
        'icon' => 'ri-menu-line',
        'module' => 'CCMS',
        // 'can' => ['setting.index'],
    ],

    [
        'text' => 'Offer Popup',
        'url' => 'admin/popup',
        'icon' => 'ri-gift-2-line',
        'module' => 'CCMS',
        // 'can' => ['setting.index'],
    ],

    [
        'text' => 'Counter',
        'url' => 'admin/counter',
        'icon' => 'ri-add-circle-line',
        'module' => 'CCMS',
        // 'can' => ['setting.index'],
    ],

    [
        'text' => 'Page',
        'url' => 'admin/page',
        'icon' => 'ri-pages-line',
        'module' => 'CCMS',
        // 'can' => ['setting.index'],
    ],

    [
        'text' => 'Slider',
        'url' => 'admin/slider',
        'icon' => 'ri-slideshow-3-line',
        'module' => 'CCMS',
        // 'can' => ['setting.index'],
    ],

    [
        'text' => 'Testimonial',
        'url' => 'admin/testimonial',
        'icon' => 'ri-feedback-line',
        'module' => 'CCMS',
        // 'can' => ['setting.index'],
    ],

    [
        'text' => 'Partner',
        'url' => 'admin/partner',
        'icon' => 'ri-hand-heart-line',
        'module' => 'CCMS',
        // 'can' => ['setting.index'],
    ],

    [
        'text' => 'Service',
        'url' => 'admin/service',
        'icon' => 'ri-customer-service-2-line',
        'module' => 'CCMS',
        // 'can' => ['setting.index'],
    ],

    [
        'text' => 'Team',
        'url' => 'admin/team',
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
                'url' => 'admin/category',
                'text' => 'Blog Category',
                // 'can' => ['user.index'],
            ],
            [
                'url' => 'admin/blog',
                'text' => 'Blog',
                // 'can' => ['user.index'],
            ],
        ],
    ],

    [
        'text' => 'Study Abroad',
        'icon' => 'ri-earth-line',
        'module' => 'CCMS',
        'submenu' => [
            [
                'url' => 'admin/country',
                'text' => 'Destination',
                // 'can' => ['user.index'],
            ],
            [
                'url' => 'admin/institution',
                'text' => 'Representative Institution',
                // 'can' => ['user.index'],
            ],

            [
                'url' => 'admin/test',
                'text' => 'Proficiency Test',
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
                'url' => 'admin/gallery-category',
                'text' => 'Gallery Category',
                // 'can' => ['user.index'],
            ],
            [
                'url' => 'admin/gallery',
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
                'url' => 'admin/faq-category',
                'text' => 'FAQ Category',
                // 'can' => ['user.index'],
            ],
            [
                'url' => 'admin/faq',
                'text' => 'FAQ',
                // 'can' => ['user.index'],
            ],
        ],
    ],
];
