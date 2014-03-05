<?php

namespace Covoiturage\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Covoiturage\FrontendBundle\Entity\Pays;
use Covoiturage\FrontendBundle\Entity\Gouvernorat;
use Covoiturage\FrontendBundle\Entity\Delegation;
use Covoiturage\FrontendBundle\Entity\voyage;


class DefaultController extends Controller
{
    public function indexAction()
    {
        $listOffres = $this->getDoctrine()->getRepository('CovoiturageFrontendBundle:voyage')->findAll();
        //var_dump($listOffres);
        return $this->render('CovoiturageFrontendBundle:Default:index.html.twig', array('list_voyages' => $listOffres));
    }

    public function registerAction()
    {

    }

    public function searchAction()
    {

    }

    public function getOffreAction()
    {

    }

    public function addOffreAction()
    {

    }

    public function getConnectionAction()
    {

    }
}
