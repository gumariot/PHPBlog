<?php

namespace AppBundle\Repository;

/**
 * ArticleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ArticleRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByCategory($id){
        /*
        $rowSql = "Select * From article_category as ac, article as a WHERE ac.category_id = \".$id.\" AND a.id=ac.category_id";
        $stmt = $this->getEntityManager()->getConnection()->prepare($rowSql);
        $stmt->execute([]);
        return $stmt->fetchAll();
        */
        $qb = $this->createQueryBuilder('p');
        $qb->select()->from("article_category","ac")->from("article","a")->where("ac.category_id = ".$id." AND a.id=ac.category_id");
        return $qb;
    }
}
