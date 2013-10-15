<?php
/**
 * Created by JetBrains PhpStorm.
 * User: yofel
 * Date: 10/15/13
 * Time: 10:25 AM
 * To change this template use File | Settings | File Templates.
 */

require_once("bootstrap.php");

$newUsername = $argv[1];

$user = new User();
$user->setName($newUsername);

$entityManager->persist($user);
$entityManager->flush();

echo("Created User with ID " . $user->getId() . "\n");