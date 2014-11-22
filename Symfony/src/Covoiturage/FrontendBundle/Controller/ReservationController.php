<?php
/**
 *
 * User: wissem
 * Date: 22/11/2014
 * Time: 22:08
 * Email: wissemr@gmail.com
 */

namespace Covoiturage\FrontendBundle\Controller;

use Covoiturage\FrontendBundle\Entity\Reservation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;



class ReservationController extends Controller
{

    public function reservationAction($voyage)
    {
        $voyagesRservations = $this->getDoctrine()->getRepository('CovoiturageFrontendBundle:Reservation')
            ->getNbReservations($voyage,Reservation::CONFIRMED);

        return $this->render('CovoiturageFrontendBundle:line:reservation.html.twig',                                       array( 'voyage_id'    => $voyage->getId(),
                                'nb_places'    => $voyage->getNbPlace(),
                                'voyage_reservations'    => $voyagesRservations,
                        )
                    );

    }

}
