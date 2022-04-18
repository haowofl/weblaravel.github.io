<?php

return [


	[
		'label' => 'Dashboard',
		'route' => 'admin.show_dashboard',
		'icon'  => 'fa-home'
	],
	[
		'label' => 'Category Manager',
		'route' => 'category.index',
		'icon'  => 'fa-shopping-cart',
		'items' => [
					[
						'label' => 'List category',
						'route' => 'category.index'
					],
					[
						'label' => 'Add category',
						'route' => 'category.create',
					]
				]
	],
	[
		'label' => 'Product Manager',
		'route' => 'products.index',
		'icon'  => 'fa-shopping-cart',
		'items' => [
					[
						'label' => 'List products',
						'route' => 'products.index'
					],
					[
						'label' => 'Add products',
						'route' => 'products.create',
					]
				]
	],
	[
		'label' => 'Slide Manager',
		'route' => 'slide.index',
		'icon'  => 'fa-image',
		'items' => [
					[
						'label' => 'List slide',
						'route' => 'slide.index'
					],
					[
						'label' => 'Add slide',
						'route' => 'slide.create',
					]
				]
	],
	[
		'label' => 'Order Manager',
		'route' => 'order.index',
		'icon'  => 'fa-shopping-cart',
		'items' => [
					[
						'label' => 'Static order',
						'route' => 'order.index'
					]
				]
	],
	[
		'label' => 'Account Manager',
		'route' => 'account.index',
		'icon'  => 'fa-user',
		'items' => [
					[
						'label' => 'List account',
						'route' => 'account.index'
					],
				]
	],
    [
        'label' => 'File Manager',
        'route' => 'admin.file',
        'icon'  => 'fa-image',
    ],
    [
        'label' => 'Log Out',
        'route' => 'admin.logout',
        'icon'  => 'fa-sign-out-alt',
    ],


];
