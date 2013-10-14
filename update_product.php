<?php
/**
 * Created by JetBrains PhpStorm.
 * User: yofel
 * Date: 10/14/13
 * Time: 8:40 PM
 * To change this template use File | Settings | File Templates.
 */

require_once("bootstrap.php");

$id = $argv[1];
$newName = $argv[2];

$product = $entityManager->find('Product', $id);

if ($product === null) {
    echo("Product $id does not exist. \n");
    exit(1);
}

$product->setName($newName);

$entityManager->flush();