<?php
/**
 * Created by JetBrains PhpStorm.
 * User: yofel
 * Date: 10/15/13
 * Time: 11:35 AM
 * To change this template use File | Settings | File Templates.
 */

use Doctrine\ORM\EntityRepository;

require_once("bootstrap.php");

class BugRepository extends EntityRepository
{
    public function getRecentBugs($number = 30)
    {
        $dql = "SELECT b, e, r FROM Bug b JOIN b.engineer e JOIN b.reporter r ORDER BY b.created DESC";

        $query = $this->getEntityManager()->createQuery($dql);
        $query->setMaxResults($number);

        return $query->getResult();
    }

    public function getRecentBugsArray($number = 30)
    {
        $dql = "SELECT b, e, r, p FROM Bug b JOIN b.engineer e " .
            "JOIN b.reporter r JOIN b.products p ORDER BY b.created DESC";

        $query = $this->getEntityManager()->createQuery($dql);
        $query->setMaxResults($number);

        return $query->getResult();
    }

    public function getUsersBugs($userId, $number = 15)
    {
        $dql = "SELECT b, e, r FROM Bug b JOIN b.engineer e JOIN b.reporter r " .
            "WHERE b.status = 'OPEN' AND e.id = ?1 OR r.id = ?1 ORDER BY b.created DESC";

        return $this->getEntityManager()->createQuery($dql)
            ->setParameter(1, $userId)
            ->setMaxResults($number)
            ->getResult();
    }

    public function getOpenBugsByProduct()
    {
        $dql = "SELECT p.id, p.name, count(b.id) AS openBugs FROM Bug b " .
            "JOIN b.product p WHERE b.status = 'OPEN' GROUP BY p.id";

        return $this->getEntityManager()->createQuery($dql)->getScalarResult();
    }
}