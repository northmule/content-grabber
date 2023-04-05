<?php

/**
 * Настройки приложения
 */
return [
    \Coderun\Vkontakte\ConfigProvider::NAME => [
        // Список id групп или id пользователей для сбора с них данных
        'owner_ids' => [],
        // Короткий адрес пользователя или сообщества для сбора с них данных
        'domains' => [],
    ],
    \Coderun\WordPress\ConfigProvider::NAME => [
        // Настройки распределения сообщений в WordPress
        'strategys' => [
            [
                'group_vk' => '', // совпадает с domains или owner_ids
                'category_wp_ids' => [3,4,5],// ИД категорий WP
            ],
        ],
    ],
];
