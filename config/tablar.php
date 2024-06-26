<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    | Here you can change the default title of your admin panel.
    |
    */

    'title' => 'Tablar',
    'title_prefix' => '',
    'title_postfix' => '',
    'bottom_title' => 'Tablar',
    'current_version' => 'v4.0',


    /*
    |--------------------------------------------------------------------------
    | Admin Panel Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    */

    'logo' => '<b>Tab</b>LAR',
    'logo_img_alt' => 'Admin Logo',

    /*
    |--------------------------------------------------------------------------
    | Authentication Logo
    |--------------------------------------------------------------------------
    |
    | Here you can set up an alternative logo to use on your login and register
    | screens. When disabled, the admin panel logo will be used instead.
    |
    */

    'auth_logo' => [
        'enabled' => false,
        'img' => [
            'path' => 'assets/tablar-logo.png',
            'alt' => 'Auth Logo',
            'class' => '',
            'width' => 50,
            'height' => 50,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look at the layout section here:
    |
    */

    'layout' => 'vertical',
    //boxed, combo, condensed, fluid, fluid-vertical, horizontal, navbar-overlap, navbar-sticky, rtl, vertical, vertical-right, vertical-transparent

    'layout_light_sidebar' => null,
    'layout_light_topbar' => true,
    'layout_enable_top_header' => true,

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions, you can look at the admin panel classes here:
    |
    */

    'classes_body' => '',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions, you can look at the urls section here:
    |
    */

    'use_route_url' => true,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password.request',
    'password_email_url' => 'password.email',
    'profile_url' => false,
    'setting_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Display Alert
    |--------------------------------------------------------------------------
    |
    | Display Alert Visibility.
    |
    */
    'display_alert' => false,

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    |
    */
    
    'menu' => [
        // Navbar items:
        [
            'text' => 'Espacio de trabajo',
            'icon' => 'ti ti-home',
            'url' => 'home'
        ],
        [
            'text' => 'Proceso de evaluación',
            'url' => '#',
            'icon' => 'ti ti-plus',
            'active' => ['support1'],
            'submenu' => [
            [
                'text' => 'Iniciar el proceso de evaluación',
                'icon' => 'ti ti-article',
                'url' => 'evalproces',
            ],
            [
                'text' => 'Asignaciones de evaluación',
                'icon' => 'ti ti-article',
                'url' => 'assignments',
            ],
            [
                'text' => 'Generar nueva versión de formulario de evaluación',
                'icon' => 'ti ti-plus',
                'url' => 'matriz',
            ],
            ],
        ],

        [
            'text' => 'Proceso de confirmación',
            'url' => '#',
            'icon' => 'ti ti-plus',
            'active' => ['support1'],
            'submenu' => [
                [
                    'text' => 'Iniciar el proceso de confirmación',
                    'icon' => 'ti ti-plus',
                    'url' => 'confirmproces',
                ],
                [
                    'text' => 'Generar nueva versión de formulario de confirmación',
                    'icon' => 'ti ti-plus',
                    'url' => 'cmatriz',
                ],
            ],
        ],

        [
            'text' => 'Reportes',
            'url' => '#',
            'icon' => 'ti ti-plus',
            'active' => ['support1'],
            'submenu' => [
                [
                    'text' => 'Reportes de Evaluación',
                    'icon' => 'ti ti-plus',
                    'url' => 'reporteval',
                ],
                [
                    'text' => 'Reportes de Confirmación',
                    'icon' => 'ti ti-plus',
                    'url' => 'reportconf',
                ],
            ],
        ],

        
        [
            'text' => 'Configuración',
            'url' => '#',
            'icon' => 'ti ti-help',
            'active' => ['support1'],
            'submenu' => [
                [
                    'text' => 'Niveles',
                    'url' => '/niveles',
                    'icon' => 'ti ti-article',
                ],
                [
                    'text' => 'Competencias',
                    'url' => '/competencias',
                    'icon' => 'ti ti-article',
                ],
                [
                    'text' => 'Factores',
                    'url' => '/factors',
                    'icon' => 'ti ti-article',
                ]
            ],
        ],

        [
            'text' => 'Datos administrativos',
            'url' => '#',
            'icon' => 'ti ti-help',
            'active' => ['support1'],
            'submenu' => [
                [
                    'text' => 'Cargos',
                    'url' => '/cargos',
                    'icon' => 'ti ti-article',
                ],
                [
                    'text' => 'Jerarquia de cargos',
                    'url' => '/jerarquias',
                    'icon' => 'ti ti-article',
                ],
                [
                    'text' => 'Áreas',
                    'url' => '/areas',
                    'icon' => 'ti ti-article',
                ],
                [
                    'text' => 'Departamentos',
                    'url' => '/deptos',
                    'icon' => 'ti ti-article',
                ],
                [
                    'text' => 'Unidades',
                    'url' => '/unidades',
                    'icon' => 'ti ti-article',
                ],
                [
                    'text' => 'Secciones',
                    'url' => '/secciones',
                    'icon' => 'ti ti-article',
                ],
            ],
        ],

        [
            'text' => 'Usuarios y personal',
            'icon' => 'ti ti-help',
            'url' => 'users',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    |
    */

    'filters' => [
        TakiElias\Tablar\Menu\Filters\GateFilter::class,
        TakiElias\Tablar\Menu\Filters\HrefFilter::class,
        TakiElias\Tablar\Menu\Filters\SearchFilter::class,
        TakiElias\Tablar\Menu\Filters\ActiveFilter::class,
        TakiElias\Tablar\Menu\Filters\ClassesFilter::class,
        TakiElias\Tablar\Menu\Filters\LangFilter::class,
        TakiElias\Tablar\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Vite
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Vite support.
    |
    | For detailed instructions you can look the Vite here:
    | https://laravel-vite.dev
    |
    */

    'vite' => true,
];
