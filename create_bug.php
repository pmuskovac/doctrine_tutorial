<?php
/**
 * Created by JetBrains PhpStorm.
 * User: yofel
 * Date: 10/15/13
 * Time: 10:27 AM
 * To change this template use File | Settings | File Templates.
 */

require_once("bootstrap.php");

$theReporterId = $argv[1];
$theDefaultEngineerId = $argv[2];
$productIds = explode(",", $argv[3]);

$reporter = $entityManager->find('User', $theReporterId);
$engineer = $entityManager->find('User', $theDefaultEngineerId);

if (!$reporter || !$engineer) {
    echo("No reporter or engineer found for the input.\n");
    exit(1);
}

$bug = new Bug();
$bug->setDescription("Something does not work!");
$bug->setCreated(new DateTime("now", new DateTimeZone('UTC')));
$bug->setStatus("OPEN");


foreach ($productIds AS $productId) {
    $product = $entityManager->find('Product', $productId);
    $bug->assignToProduct($product);
}

$bug->setReporter($reporter);
$bug->setEngineer($engineer);

$entityManager->persist($bug);
$entityManager->flush();

echo("Your new Bug Id: " . $bug->getId() . "\n");