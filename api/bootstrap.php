<?php

// FROM https://www.doctrine-project.org/projects/doctrine-mongodb-odm/en/latest/reference/introduction.html#setup

use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;

if ( ! file_exists($file = __DIR__.'/vendor/autoload.php')) {
    throw new RuntimeException('Install dependencies to run this script.');
}

$loader = require_once $file;
$loader->set('Documents', __DIR__);

AnnotationRegistry::registerLoader([$loader, 'loadClass']);

$connection = new Connection();

$config = new Configuration();
$config->setProxyDir(__DIR__ . '/Proxies');
$config->setProxyNamespace('Proxies');
//$config->setAutoGenerateProxyClasses(FALSE);
$config->setHydratorDir(__DIR__ . '/Hydrators');
$config->setHydratorNamespace('Hydrators');
//$config->setAutoGenerateHydratorClasses(FALSE);
$config->setDefaultDB('doctrine_odm');
$config->setMetadataDriverImpl(AnnotationDriver::create(__DIR__ . '/Documents'));

$GLOBALS['odmDM'] = DocumentManager::create($connection, $config);

?>