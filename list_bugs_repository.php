<?php
/**
 * Created by JetBrains PhpStorm.
 * User: yofel
 * Date: 10/15/13
 * Time: 11:44 AM
 * To change this template use File | Settings | File Templates.
 */

require_once("bootstrap.php");

$bugs = $entityManager->getRepository('Bug')->getRecentBugs();

foreach ($bugs as $bug) {
    echo($bug->getDescription() . " - " . $bug->getCreated()->format('d.m.Y') . "\n");
    echo("    Reported by: " . $bug->getReporter()->getName() . "\n");
    echo("    Assigned to: " . $bug->getEngineer()->getName() . "\n");
    foreach($bug->getProducts() as $product) {
        echo("    Platform: " . $product->getName() . "\n");
    }
    echo("\n");
}