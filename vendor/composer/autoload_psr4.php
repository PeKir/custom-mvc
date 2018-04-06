<?php

// autoload_psr4.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'services\\' => array($baseDir . '/services'),
    'repository\\' => array($baseDir . '/repository'),
    'phpDocumentor\\Reflection\\' => array($vendorDir . '/phpdocumentor/reflection-common/src', $vendorDir . '/phpdocumentor/reflection-docblock/src', $vendorDir . '/phpdocumentor/type-resolver/src'),
    'models\\' => array($baseDir . '/models'),
    'entities\\' => array($baseDir . '/entities'),
    'core\\' => array($baseDir . '/core'),
    'controllers\\' => array($baseDir . '/controllers'),
    'Webmozart\\Assert\\' => array($vendorDir . '/webmozart/assert/src'),
    'Symfony\\Component\\Yaml\\' => array($vendorDir . '/symfony/yaml'),
    'Doctrine\\Instantiator\\' => array($vendorDir . '/doctrine/instantiator/src/Doctrine/Instantiator'),
);
