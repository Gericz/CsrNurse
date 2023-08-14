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
    ],
    
];
