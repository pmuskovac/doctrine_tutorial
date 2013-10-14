<?php
/**
 * Created by JetBrains PhpStorm.
 * User: yofel
 * Date: 10/14/13
 * Time: 6:24 PM
 * To change this template use File | Settings | File Templates.
 */

require_once("bootstrap.php");

$id = $argv[1];
$product = $entityManager->find('Product', $id);

if ($product === null) {
    echo("No product found.\n");
    exit(1);
}

echo sprintf("-%s\n", $product->getName());
