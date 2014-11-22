<?php
/**
 * 
 * User: wissem
 * Date: 22/11/2014
 * Time: 22:01
 * Email: wissemr@gmail.com
 */

namespace Covoiturage\FrontendBundle\Repository;

use Covoiturage\FrontendBundle\Entity\Reservation;
use Doctrine\ORM\EntityRepository;
use \Doctrine\ORM\Tools\Pagination\Paginator;


class ReservationRepository extends EntityRepository
{

    /**
     * Get the number of Reservations
     *
     * @param int $voyage
     * @param int $status
     * @return int
     */
    public function getNbReservations($voyage, $status = Reservation::CONFIRMED )
    {
        $qb = $this->_em->createQueryBuilder()
            ->select('count(reservation.id)')
            ->from('CovoiturageFrontendBundle:Reservation','reservation')
            ->where('reservation.status = '.$status)
            ->where('reservation.voyage = :voyage')
            ->setParameter('voyage',$voyage)
        ;

        $count = $qb->getQuery()->getSingleScalarResult();

        return $count;
    }

} 