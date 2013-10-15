<?php
/**
 * Created by JetBrains PhpStorm.
 * User: yofel
 * Date: 10/15/13
 * Time: 11:24 AM
 * To change this template use File | Settings | File Templates.
 */

require_once("bootstrap.php");

$dql = "SELECT p.id, p.name, count(b.id) AS openBugs FROM Bug b " .
    "JOIN b.products p WHERE b.status = 'OPEN' GROUP BY p.id";

$productBugs = $entityManager->createQuery($dql)->getScalarResult();

foreach($productBugs as $productBug) {
    echo($productBug['name'] . " has " . $productBug['openBugs'] . " open bugs!\n");
}