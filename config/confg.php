<?php
/*
 * настройки приложения
 */

$config = [
    //Список классов, ктр должны создавать при инициализации приложения
    'components' => [
        'cache' => 'vendor\libs\Cache',
    ],
];

return $config;
