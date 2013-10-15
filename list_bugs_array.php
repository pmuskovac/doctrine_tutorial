<?php
/**
 * Created by JetBrains PhpStorm.
 * User: yofel
 * Date: 10/15/13
 * Time: 11:07 AM
 * To change this template use File | Settings | File Templates.
 */

require_once("bootstrap.php");

$dql = "SELECT b, e, r, p FROM Bug b JOIN b.engineer e " .
    "JOIN b.reporter r JOIN b.products p ORDER BY b.created DESC";

$query = $entityManager->createQuery($dql);
$bugs = $query->getArrayResult();

foreach ($bugs as $bug) {
    echo($bug['description'] . " - " . $bug['created']->format('d.m.Y') . "\n");
    echo("    Reported by: " . $bug['reporter']['name'] . "\n");
    echo("    Assigned to: " . $bug['engineer']['name'] . "\n");
    foreach ($bug['products'] as $product) {
        echo("    Platform: " . $product['name'] . "\n");
    }
    echo("\n");
}