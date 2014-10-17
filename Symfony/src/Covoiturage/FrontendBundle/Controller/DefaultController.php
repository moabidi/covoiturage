<?php

namespace Covoiturage\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Covoiturage\FrontendBundle\Entity\Pays;
use Covoiturage\FrontendBundle\Entity\Gouvernorat;
use Covoiturage\FrontendBundle\Entity\Delegation;
use Covoiturage\FrontendBundle\Entity\voyage;
use Doctrine\Common\Collections\Expr;
use Doctrine\Common\Collections\Criteria;


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

    /**
     * @return Response
     */
    public function getAllGouvernoratsAction()
    {
        $listGouvernorats = $this->getDoctrine()->getRepository('CovoiturageFrontendBundle:gouvernorat')->findAll();
        //var_dump($listOffres);
        return $this->render('CovoiturageFrontendBundle:_common:selection.html.twig', array('list_items' => $listGouvernorats));
    }

    /**
     * @param int $id
     * @return Response
     */
    public function getAllDelegationsAction($id = null)
    {
        $listDelegations = $this->getDoctrine()->getRepository('CovoiturageFrontendBundle:delegation')->matching( new Criteria( new Expr\Comparison( "idGouvernorat",Expr\Comparison::EQ,"2")));
        //var_dump($listOffres);
        return $this->render('CovoiturageFrontendBundle:_common:selection.html.twig', array('list_items' => $listDelegations));
    }
}
