<?php
/**
 * Created by JetBrains PhpStorm.
 * User: yofel
 * Date: 10/14/13
 * Time: 2:32 PM
 * To change this template use File | Settings | File Templates.
 */

require_once("bootstrap.php");

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);