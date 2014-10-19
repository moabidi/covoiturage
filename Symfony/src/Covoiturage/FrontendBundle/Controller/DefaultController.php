<?php

namespace Covoiturage\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\Expr;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Query\Expr as QueryExpr;


class DefaultController extends Controller
{
    public function indexAction()
    {
        $listOffres = $this->getDoctrine()->getRepository('CovoiturageFrontendBundle:Voyage')->findAll();
        //var_dump($listOffres);
        return $this->render('CovoiturageFrontendBundle:Default:index.html.twig', array('list_voyages' => $listOffres));
    }

    public function registerAction()
    {

    }

    /**
     * @param Request $request
     */
    public function searchAction(Request $request)
    {
        $horaire = $request->query->get('date');
        $nbPlace = $request->query->get('nbPlace');
        $startingLoc = $request->query->get('startingLoc');
        $arrivingLoc = $request->query->get('arrivingLoc');
        $startingDel = $request->query->get('startingDel');
        $arrivingDel = $request->query->get('arrivingDEl');
        $startingGov = $request->query->get('startingGov');
        $arrivingGOv = $request->query->get('arrivingGov');

        //var_dump($horaire);die();
        //$horaire = "16/02/2014 07:00";
        $creteria = array();
        if( $horaire !== null )
            $creteria["horaire"] = $horaire;
        if( $nbPlace !== null )
            $creteria["nbPlace"] = $nbPlace;
        if( $startingLoc !== null )
            $creteria["idArriveLoc"] = $startingLoc;
        if( $arrivingLoc !== null )
            $creteria["idDepartLoc"] = $arrivingLoc;
        if( $startingDel !== null )
            $creteria["idDepartLoc"] = $arrivingLoc;

        $emVoyage = $this->getDoctrine()->getRepository('CovoiturageFrontendBundle:Voyage');
        $qb = $emVoyage->createQueryBuilder('v')
                ->innerJoin('v.idDepart','ld')
                ->innerJoin('ld.idGouvernorat','gd', QueryExpr\Join::WITH, 'gd.id = 23')
                ->innerJoin('v.idArrive','la')
                ->innerJoin('la.idGouvernorat','ga', QueryExpr\Join::WITH, 'ga.id = 3');
                //->where('v.horaire=:horaire')
                //->andWhere('v.nbPlace=:nbPlace')
                //->setParameter('horaire', $horaire)
                //->setParameter('nbPlace', $nbPlace)
                //->setParameter('startingDel', $startingDel);
        $q = $qb->getQuery();
        $listOffres = $q->execute();
        //$listOffres = $this->getDoctrine()->getRepository('CovoiturageFrontendBundle:Voyage')->findBy($creteria);
        return $this->render('CovoiturageFrontendBundle:Default:index.html.twig', array('list_voyages' => $listOffres));
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
