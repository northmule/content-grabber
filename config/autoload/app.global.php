<?php

/**
 * Настройки приложения
 */
return [
    \Coderun\Vkontakte\ConfigProvider::NAME => [
        'access_token' => getenv('APP_VK_ACCESS_TOKEN'),
        'api_version' => getenv('APP_VK_API_VERSION'),
    ],
    \Coderun\WordPress\ConfigProvider::NAME => [
        'user' => getenv('APP_WP_USER'),
        'password' => getenv('APP_WP_PASSWORD'),
        'site' => getenv('APP_WP_SITE'),
        'templates' => ['data/templates'],
        'cache_path' => 'data/cache',
    ],
];
