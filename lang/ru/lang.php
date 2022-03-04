<?php return [
    'plugin' => [
        'name' => 'Robots.txt',
        'description' => 'Плагин для генерации Robots.txt и Meta тегa robots'
    ],

    'config' => [
        'description' => 'Настройки robots.txt и Meta тегa robots',
        'index' => 'Укажите, должны ли поисковые системы индексировать эту страницу',
        'follow' => 'Укажите, должны ли поисковые системы переходить по ссылкам на этой странице',
    ],

    'permissions' => 'Robots.txt',

    'settings' => [
        'enable_robots_txt' => 'Использовать robots.txt',
        'enable_robots_meta' => 'Использовать meta теги robots',
    ],

    'component' => [
        'description' => 'Отображает мета-теги Robots',
    ]
];