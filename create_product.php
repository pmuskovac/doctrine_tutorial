<?php
/**
 * Created by JetBrains PhpStorm.
 * User: yofel
 * Date: 10/14/13
 * Time: 5:06 PM
 * To change this template use File | Settings | File Templates.
 */

require_once("bootstrap.php");

$newProductName = $argv[1];

$product = new Product();
$product->setName($newProductName);

$entityManager->persist($product);
$entityManager->flush();

echo "Created Product with ID " . $product->getId() . "\n";