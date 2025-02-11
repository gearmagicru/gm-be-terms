<?php
/**
 * Этот файл является частью модуля веб-приложения GearMagic.
 * 
 * Файл конфигурации модуля.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c] 2015 Этот файл является частью модуля веб-приложения GearMagic. Web-студия
 * @license https://gearmagic.ru/license/
 */

return [
    'translator' => [
        'locale'   => 'auto',
        'patterns' => [
            'text' => [
                'basePath' => __DIR__ . '/../lang',
                'pattern'   => 'text-%s.php'
            ]
        ],
        'autoload' => ['text'],
        'external' => [BACKEND]
    ],

    'accessRules' => [
        // для авторизованных пользователей Панели управления
        [ // разрешение "Полный доступ" (any)
            'allow',
            'permission'  => 'any',
            'controllers' => [
                'Grid'      => ['data', 'view', 'update', 'delete'],
                'Form'      => ['data', 'view', 'add', 'update', 'delete'],
                'Search'    => ['data', 'view']
            ],
            'users' => ['@backend']
        ],
        [ // разрешение "Информация о модуле" (info)
            'allow',
            'permission'  => 'info',
            'controllers' => ['Info'],
            'users'       => ['@backend']
        ],
        [ // для всех остальных, доступа нет
            'deny'
        ]
    ],

    'viewManager' => [
        'id'          => 'gm-terms-{name}',
        'useTheme'    => true,
        'useLocalize' => true,
        'viewMap'     => [
            // информации о модуле
            'info' => [
                'viewFile'      => '//backend/module-info.phtml', 
                'forceLocalize' => true
            ],
            'form' => '/form.json'
        ]
    ]
];
