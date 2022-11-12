<?php

return [
    /**
     * Its used for route and sidebar menu name.
     */
    'name' => 'generators',

    /**
     * All avaibale column type for migration.
     */
    'column_types' => [
        'string',
        'integer',
        'text',
        'bigInteger',
        'boolean',
        'char',
        'date',
        'time',
        'year',
        'dateTime',
        'decimal',
        'double',
        'enum',
        'float',
        'foreignId',
        'tinyInteger',
        'tinyText',
        'longText'
    ],

    /**
     * If any input file(image) as default will used options below.
     */
    'image' => [
        /**
         * Path for image store into.
         *
         * avaiable options:
         * 1. public
         * 2. storage
         */
        'path' => 'storage',

        /**
         * Will used if image is nullable.
         */
        'default' => 'https://via.placeholder.com/350?text=No+Image+Avaiable',

        /**
         * Crop the uploaded image using intervention image.
         *
         * when set to false will ignore config below(aspect_ratio, width, and height).
         */
        'crop' => true,

        /**
         * When set to true the uploaded image aspect ratio will still original.
         */
        'aspect_ratio' => true,

        /**
         * Crop image size.
         */
        'width' => 500,
        'height' => 500,
    ],

    'format' => [
        /**
         * Will used to first year on select, if any column type year.
         */
        'first_year' => 1900,

        /**
         * If any date column type will cast and display used this format, but for input date still will used Y-m-d format.
         *
         * another most common format:
         * - M d Y
         * - d F Y
         * - Y m d
         */
        'date' => 'd/m/Y',

        /**
         * If any time column type will cast and display used this format.
         */
        'time' => 'H:i',

        /**
         * If any datetime column type or datetime-local on input format will cast and display used this format.
         */
        'datetime' => 'd/m/Y H:i',

        /**
         * Limit string on index view for any column type text or longtext.
         */
        'limit_text' => 200,
    ],

    /**
     * It will used for generator to manage and show menus on sidebar views.
     *
     * Example:
     * [
     *   'header' => 'Main',
     *
     *   // All permissions in menus[] and submenus[]
     *   'permissions' => ['view test'],
     *
     *   menus' => [
     *       [
     *          'title' => 'Main Data',
     *          'icon' => '<i class="bi bi-collection-fill"></i>',
     *          'route' => null,
     *
     *          // permission always null when isset submenus
     *          'permission' => null,
     *
     *          // All permissions on submenus[] and will empty[] when submenus equals to []
     *          'permissions' => ['view test'],
     *
     *          'submenus' => [
     *                 [
     *                     'title' => 'Tests',
     *                     'route' => '/tests',
     *                     'permission' => 'view test'
     *                  ]
     *               ],
     *           ],
     *       ],
     *  ],
     *
     * This code below always change when you using a generator and maybe you must to lint or format the code.
     */
    'sidebars' => [
        [
            'header' => 'Menu Koperasi',
            'permissions' => [
                'view producttype',
                'view kopproduct',
                'view usersaving',
                'view savingtransaction',
                'view savingaccount',
                'view usertopup',
                'view usertransaction',
                'view bank',
                'view merchant',
                'view merchanttransaction',
                'view cashflow'
            ],
            'menus' => [
                [
                    'title' => 'Produk Koperasi',
                    'icon' => '<i class="bi bi-collection-fill"></i>',
                    'route' => null,
                    'permission' => null,
                    'permissions' => [
                        'view producttype',
                        'view kopproduct'
                    ],
                    'submenus' => [
                        [
                            'title' => 'Jenis Produk',
                            'icon' => '<i class="bi bi-briefcase"></i>',
                            'route' => '/product-types',
                            'permission' => 'view producttype',
                            'permissions' => [],
                            'submenus' => []
                        ],
                        [
                            'title' => 'Produk Koperasi',
                            'icon' => '<i class="bi bi-bricks"></i>',
                            'route' => '/kop-products',
                            'permission' => 'view kopproduct',
                            'permissions' => [],
                            'submenus' => []
                        ]
                    ]
                ],
                [
                    'title' => 'Keuangan Koperasi',
                    'icon' => '<i class="bi bi-collection-fill"></i>',
                    'route' => null,
                    'permission' => null,
                    'permissions' => [
                        'view usersaving',
                        'view savingtransaction',
                        'view savingaccount',
                        'view usertopup',
                        'view usertransaction',
                        'view bank',
                        'view merchant',
                        'view merchanttransaction',
                        'view cashflow'
                    ],
                    'submenus' => [
                        [
                            'title' => 'Simpanan Anggota',
                            'icon' => '<i class="bi bi-wallet-fill"></i>',
                            'route' => '/user-savings',
                            'permission' => 'view usersaving',
                            'permissions' => [],
                            'submenus' => []
                        ],
                        [
                            'title' => 'Pencairan Simpanan Anggota',
                            'icon' => '<i class="bi bi-piggy-bank-fill"></i>',
                            'route' => '/saving-transactions',
                            'permission' => 'view savingtransaction',
                            'permissions' => [],
                            'submenus' => []
                        ],
                        [
                            'title' => 'Kode Akun',
                            'icon' => '<i class="bi bi-piggy-bank-fill"></i>',
                            'route' => '/saving-accounts',
                            'permission' => 'view savingaccount',
                            'permissions' => [],
                            'submenus' => []
                        ],
                        [
                            'title' => 'Kas',
                            'icon' => '<i class="bi bi-piggy-bank-fill"></i>',
                            'route' => '/cashflows',
                            'permission' => 'view cashflow',
                            'permissions' => [],
                            'submenus' => []
                        ],
                        [
                            'title' => 'Top Up JIMpay',
                            'icon' => '<i class="bi bi-building"></i>',
                            'route' => '/user-topups',
                            'permission' => 'view usertopup',
                            'permissions' => [],
                            'submenus' => []
                        ],
                        [
                            'title' => 'Transaksi Anggota',
                            'icon' => '<i class="bi bi-people"></i>',
                            'route' => '/user-transactions',
                            'permission' => 'view usertransaction',
                            'permissions' => [],
                            'submenus' => []
                        ],
                        [
                            'title' => 'Bank',
                            'icon' => '<i class="bi bi-building"></i>',
                            'route' => '/banks',
                            'permission' => 'view bank',
                            'permissions' => [],
                            'submenus' => []
                        ],
                        [
                            'title' => 'Mitra',
                            'icon' => '<i class="bi bi-building"></i>',
                            'route' => '/merchants',
                            'permission' => 'view merchant',
                            'permissions' => [],
                            'submenus' => []
                        ],
                        [
                            'title' => 'Transaksi Mitra',
                            'icon' => '<i class="bi bi-people"></i>',
                            'route' => '/merchant-transactions',
                            'permission' => 'view merchanttransaction',
                            'permissions' => [],
                            'submenus' => []
                        ]
                    ]
                ]
            ]
        ],
        [
            'header' => 'DonationTransactions',
            'permissions' => [
                'view donation',
                'view donationtransaction',
                'view donationdisbursement'
            ],
            'menus' => [
                [
                    'title' => 'Donations',
                    'icon' => '<i class="bi bi-people"></i>',
                    'route' => '/donations',
                    'permission' => 'view donation',
                    'permissions' => [],
                    'submenus' => []
                ],
                [
                    'title' => 'Donasi Masuk',
                    'icon' => '<i class="bi bi-people"></i>',
                    'route' => '/donation-transactions',
                    'permission' => 'view donationtransaction',
                    'permissions' => [],
                    'submenus' => []
                ],
                [
                    'title' => 'Pencairan Donasi',
                    'icon' => '<i class="bi bi-building"></i>',
                    'route' => '/donation-disbursements',
                    'permission' => 'view donationdisbursement',
                    'permissions' => [],
                    'submenus' => []
                ]
            ]
        ],
        [
            'header' => 'Menu Paylater',
            'permissions' => [
                'view paylaterprovider',
                'view paylater',
                'view paylatertransaction'
            ],
            'menus' => [
                [
                    'title' => 'Provider',
                    'icon' => '<i class="bi bi-building"></i>',
                    'route' => '/paylater-providers',
                    'permission' => 'view paylaterprovider',
                    'permissions' => [],
                    'submenus' => []
                ],
                [
                    'title' => 'Paylaters',
                    'icon' => '<i class="bi bi-people"></i>',
                    'route' => '/paylaters',
                    'permission' => 'view paylater',
                    'permissions' => [],
                    'submenus' => []
                ],
                [
                    'title' => 'Angsuran',
                    'icon' => '<i class="bi bi-people"></i>',
                    'route' => '/paylater-transactions',
                    'permission' => 'view paylatertransaction',
                    'permissions' => [],
                    'submenus' => []
                ]
            ]
        ],
        [
            'header' => 'Users',
            'permissions' => [
                'view user',
                'view role & permission'
            ],
            'menus' => [
                [
                    'title' => 'Users',
                    'icon' => '<i class="bi bi-people-fill"></i>',
                    'route' => '/users',
                    'permission' => 'view user',
                    'permissions' => [],
                    'submenus' => []
                ],
                [
                    'title' => 'Permissions',
                    'icon' => '<i class="bi bi-people-fill"></i>',
                    'route' => '/permissions',
                    'permission' => 'view role & permission',
                    'permissions' => [],
                    'submenus' => []
                ],
                [
                    'title' => 'Roles',
                    'icon' => '<i class="bi bi-person-check-fill"></i>',
                    'route' => '/roles',
                    'permission' => 'view role & permission',
                    'permissions' => [],
                    'submenus' => []
                ]
            ]
        ],
        [
            'header' => 'Menu Jimmart',
            'permissions' => [
                'view category',
                'view product',
                'view productimage',
                'view cart',
                'view detailproduct',
                'view usertransactionitem'
            ],
            'menus' => [
                [
                    'title' => 'Kategori',
                    'icon' => '<i class="bi bi-basket"></i>',
                    'route' => '/categories',
                    'permission' => 'view category',
                    'permissions' => [],
                    'submenus' => []
                ],
                [
                    'title' => 'Produk',
                    'icon' => '<i class="bi bi-shop"></i>',
                    'route' => '/products',
                    'permission' => 'view product',
                    'permissions' => [],
                    'submenus' => []
                ],
                [
                    'title' => 'Gambar Produk',
                    'icon' => '<i class="bi bi-bag-check"></i>',
                    'route' => '/product-images',
                    'permission' => 'view productimage',
                    'permissions' => [],
                    'submenus' => []
                ],
                [
                    'title' => 'Carts',
                    'icon' => '<i class="bi bi-cart-plus-fill"></i>',
                    'route' => '/carts',
                    'permission' => 'view cart',
                    'permissions' => [],
                    'submenus' => []
                ],
                [
                    'title' => 'Detail Produk',
                    'icon' => '<i class="bi bi-people"></i>',
                    'route' => '/detail-products',
                    'permission' => 'view detailproduct',
                    'permissions' => [],
                    'submenus' => []
                ],
                [
                    'title' => 'User-transaction-items',
                    'icon' => '<i class="bi bi-briefcase"></i>',
                    'route' => '/user-transaction-items',
                    'permission' => 'view usertransactionitem',
                    'permissions' => [],
                    'submenus' => []
                ]
            ]
        ]
    ]
];
