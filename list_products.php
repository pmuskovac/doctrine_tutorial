<?php
/**
 * Created by JetBrains PhpStorm.
 * User: yofel
 * Date: 10/14/13
 * Time: 6:21 PM
 * To change this template use File | Settings | File Templates.
 */

require_once("bootstrap.php");

$productRepository = $entityManager->getRepository('Product');
$products = $productRepository->findAll();

foreach($products as $product) {
    echo sprintf("-%s\n", $product->getName());
}