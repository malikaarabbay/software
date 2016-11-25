<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'ru-RU',
    'sourceLanguage' => 'en-US',
    'timeZone' => 'Asia/Almaty',

    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'sourceLanguage' => 'ru'
                ],
            ],
        ],

    ],
    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\PathController',
            'access' => ['@'],
            'root' => [
                'baseUrl'=>'http://software/',
                'basePath'=>'@frontend/web',
                'path' => '/images',
                'name' => 'Images'
            ],
//            'watermark' => [
//                        'source'         => __DIR__.'/logo.png', // Path to Water mark image
//                         'marginRight'    => 5,          // Margin right pixel
//                         'marginBottom'   => 5,          // Margin bottom pixel
//                         'quality'        => 95,         // JPEG image save quality
//                         'transparency'   => 70,         // Water mark image transparency ( other than PNG )
//                         'targetType'     => IMG_GIF|IMG_JPG|IMG_PNG|IMG_WBMP, // Target image formats ( bit-field )
//                         'targetMinPixel' => 200         // Target image minimum pixel size
//            ]
        ]
    ],
];
