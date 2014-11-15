<?php
/**
 * 
 * User: wissem
 * Date: 15/11/2014
 * Time: 19:31
 * Email: wissemr@gmail.com
 */

namespace Covoiturage\FrontendBundle\Repository;

use Doctrine\ORM\EntityRepository;
use \Doctrine\ORM\Tools\Pagination\Paginator;


class VoyageRepository extends EntityRepository
{
    /**
     * Get the list of voyages
     *
     * @param int $page
     * @param int $maxperpage
     * @param string $sortby
     * @return Paginator
     */
    public function getList($page=1, $maxperpage=10)
    {
        $qb = $this->_em->createQueryBuilder()
            ->select('voyage')
            ->from('CovoiturageFrontendBundle:Voyage','voyage')
            ->orderBy('voyage.id','DESC')
        ;

        $qb->setFirstResult(($page-1) * $maxperpage)
            ->setMaxResults($maxperpage);

        return new Paginator($qb);
    }

    /**
     * Get the number of Voyages
     *
     * @return int
     */
    public function countVoyages()
    {
        $qb = $this->_em->createQueryBuilder()
            ->select('count(voyage.id)')
            ->from('CovoiturageFrontendBundle:Voyage','voyage')
        ;

        $count = $qb->getQuery()->getSingleScalarResult();

        return $count;
    }

} 