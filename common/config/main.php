<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'info'],
                    'logFile' => '@app/runtime/logs/brlst.log', // Path to the log file
                    'categories' => ['brlst'],
                ],
            ],
        ],
    ],
    
    'modules' => [
        'auth' => [
            'class' => 'common\modules\auth\Module',
        ],
        'apprv'=>[
            'class'=> 'common\modules\apprv\apprv',
        ],
        'brlst' => [
            'class' => 'common\modules\brlst\brlst',
        ],
        'rtrn' => [
            'class' => 'common\modules\rtrn\rtrn',
        ],

    ],
    
];
