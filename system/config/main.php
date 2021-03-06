<?php

// Yii::setPathOfAlias('local','path/to/local-folder');
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'xyeh',
    'preload' => array('log'),
    'defaultController' => 'main/index/index',
    'timeZone' => 'PRC',
    'components' => array(
        'request' => array(
            'enableCsrfValidation' => true,
        ),
        'user' => array(
            'allowAutoLogin' => true,
        ),
        'db' => require(dirname(__FILE__) . '/db.php'),
        // 'errorHandler'=>array(
        // 	'errorAction'=>'site/error',
        // ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'caseSensitive' => false,
            'showScriptName' => false,
            'rules' => array(
                '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
            )
        ),
        'log' => array(
            'class' => '\CLogRouter',
            'routes' => array(
                array(
                    'class' => '\CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                // uncomment the following to show log messages on web pages
//                array(
//                    'class' => '\CWebLogRoute',
//                    'levels' => 'trace',
//                    'categories' => 'system.db.*',
//                ),
                array(
                    'class' => '\CProfileLogRoute',
                ),
            ),
        ),
    ),
    // using Yii::app()->params['paramName']
    'params' => require(dirname(__FILE__) . '/params.php'),
    'modules' => require(dirname(__FILE__) . '/modules.php'),
);
