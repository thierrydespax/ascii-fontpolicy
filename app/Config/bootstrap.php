<?php

require_once  __DIR__ . "/../../vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

  
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'formation',
    'enum'     => "string",
);

return $entityManager = EntityManager::create(
    $dbParams, 
//    Setup::createXMLMetadataConfiguration(
//    [__DIR__ . "/../../src/Entity"]
    Setup::createAnnotationMetadataConfiguration(
[__DIR__ . "/../../src/Entity"], false, null, null, false
	)
);