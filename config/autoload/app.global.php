<?php

/**
 * Настройки приложения
 */
return [
    \Coderun\Vkontakte\ConfigProvider::CONFIG_KEY => [
        'access_token' => getenv('APP_VK_ACCESS_TOKEN'),
        'owner_ids' => getenv('APP_VK_OWNER_IDS'),
        'domains' => getenv('APP_VK_DOMAINS'),
        'api_version' => getenv('APP_VK_API_VERSION'),
    ],
];
