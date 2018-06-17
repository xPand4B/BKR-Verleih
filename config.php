<?php
// Array variables will be saved as environment varaiables (/app/autoload.php)
$config = [
    'Version' => [
        'currentVersion' => '1.1.0'
    ],

    'Website' => [
        'WEB_DOMAIN' => '',
        'WEB_TITLE'  => ''
    ],

    // If you are switching the mode, one has to be 'true', the other one 'false'
    'Mode' => [
        'development' => 'true',
        'production'  => 'false'
    ],

    'MySQL_Development' => [
        'DB_DEV_HOST'      => '',
        'DB_DEV_USERNAME'  => '',
        'DB_DEV_PASSWORD'  => '',
        'DB_DEV_DATABASE'  => ''
    ],

    'MySQL_Production' => [
        'DB_LIVE_HOST'     => '',
        'DB_LIVE_USERNAME' => '',
        'DB_LIVE_PASSWORD' => '',
        'DB_LIVE_DATABASE' => ''
    ]
];
