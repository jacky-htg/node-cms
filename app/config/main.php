<?php

return array(

    'defaultController' => 'Login',

    // Just put null value if you has enable .htaccess file
    //'indexFile' => INDEX_FILE . '/',
    'indexFile' => null,

    'module' => array(
        'path' => APP,
        'domainMapping' => array(),
    ),

    'vendor' => array(
        //'path' => GEAR.'vendors/'
        'path' => APP.'vendor/vendor/'
    ),

    'alias' => array(
        /*
        'controller' => array(
            'class' => 'Alias',
            'method' => 'index'
        ),
        */
        'method' => 'alias'
    ),
);
