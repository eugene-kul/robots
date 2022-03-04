<?php return [
    'plugin' => [
        'name' => 'Robots.txt',
        'description' => 'Plugin for generating Robots.txt and Meta tag robots'
    ],

    'config' => [
        'description' => 'Settings robots.txt and Meta tag robots',
        'index' => 'Specify whether search engines should index this page',
        'follow' => 'Specify whether search engines should follow the links on this page',
    ],

    'permissions' => 'Robots.txt',

    'settings' => [
        'enable_robots_txt' => 'Use Robots.txt',
        'enable_robots_meta' => 'Use robots meta tags',
    ],

    'component' => [
        'description' => 'Displays Robots meta tags',
    ]
];