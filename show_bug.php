<?php
/**
 * Created by JetBrains PhpStorm.
 * User: yofel
 * Date: 10/15/13
 * Time: 11:12 AM
 * To change this template use File | Settings | File Templates.
 */

require_once("bootstrap.php");

$theBugId = $argv[1];

$bug = $entityManager->find("Bug", (int)$theBugId);

echo("Bug: " . $bug->getDescription() . "\n");
echo("Engineer: " . $bug->getEngineer()->getName() . "\n");