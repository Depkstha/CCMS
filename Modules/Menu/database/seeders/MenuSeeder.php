<?php

namespace Modules\Menu\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Menu\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $headerMenus = [
            [
                'menu_location_id' => 1,
                'title' => 'Home',
                'alias' => 'home',
                'target' => '_self',
                'parent_id' => 0,
                'order' => 1,
                'type' => 'single-link',
                'parameter' => '/',
                'status' => 11,
            ],

            [
                'menu_location_id' => 1,
                'title' => 'Company Profile',
                'alias' => 'company-profile',
                'target' => '_self',
                'parent_id' => 0,
                'order' => 2,
                'type' => 'single-link',
                'parameter' => '/#company-profile',
                'status' => 11,
            ],

            [
                'menu_location_id' => 1,
                'title' => 'Service',
                'alias' => 'service',
                'target' => '_self',
                'parent_id' => 0,
                'order' => 3,
                'type' => 'single-link',
                'parameter' => '/#service',
                'status' => 11,
            ],

            [
                'menu_location_id' => 1,
                'title' => 'Blog',
                'alias' => 'blog',
                'target' => '_self',
                'parent_id' => 0,
                'order' => 4,
                'type' => 'single-link',
                'parameter' => '/#blog',
                'status' => 11,
            ],

            [
                'menu_location_id' => 1,
                'title' => 'Contact',
                'alias' => 'contact',
                'target' => '_self',
                'parent_id' => 0,
                'order' => 5,
                'type' => 'single-link',
                'parameter' => '/#contact',
                'status' => 11,
            ],
        ];


        $footerMenus = [
            [
                'menu_location_id' => 2,
                'title' => 'Company',
                'alias' => 'company',
                'target' => '_self',
                'parent_id' => 0,
                'order' => 6,
                'type' => 'single-link',
                'parameter' => '/',
                'status' => 11,
            ],

            [
                'menu_location_id' => 2,
                'title' => 'Solutions',
                'alias' => 'Solutions',
                'target' => '_self',
                'parent_id' => 0,
                'order' => 7,
                'type' => 'single-link',
                'parameter' => '/',
                'status' => 11,
            ],

            [
                'menu_location_id' => 2,
                'title' => 'About Us',
                'alias' => 'about-us',
                'target' => '_self',
                'parent_id' => 6,
                'order' => 8,
                'type' => 'single-link',
                'parameter' => '/about-us',
                'status' => 11,
            ],

            [
                'menu_location_id' => 2,
                'title' => 'Meet Our Team',
                'alias' => 'meet-our-team',
                'target' => '_self',
                'parent_id' => 6,
                'order' => 9,
                'type' => 'single-link',
                'parameter' => '/meet-our-team',
                'status' => 11,
            ],

            [
                'menu_location_id' => 2,
                'title' => 'IT Management',
                'alias' => 'it-management',
                'target' => '_self',
                'parent_id' => 7,
                'order' => 10,
                'type' => 'single-link',
                'parameter' => '/it-management',
                'status' => 11,
            ],

            [
                'menu_location_id' => 2,
                'title' => 'Cyber Security',
                'alias' => 'cyber-security',
                'target' => '_self',
                'parent_id' => 7,
                'order' => 11,
                'type' => 'single-link',
                'parameter' => '/cyber-security',
                'status' => 11,
            ],

            
        ];

        $menus = array_merge($headerMenus, $footerMenus);
        Menu::insertOrIgnore($menus);
    }
}
