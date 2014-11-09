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
        $startingLoc = $request->query->get('sloc');
        $arrivingLoc = $request->query->get('aloc');
        $startingDel = $request->query->get('sdel');
        $arrivingDel = $request->query->get('adel');
        $startingGov = $request->query->get('sgov');
        $arrivingGov = $request->query->get('agov');

        //var_dump($horaire);die();
        $horaire = "16/02/2014 07:00";

//var_dump($startingGov);die();
        $emVoyage = $this->getDoctrine()->getRepository('CovoiturageFrontendBundle:Voyage');
        $qb = $emVoyage->createQueryBuilder('v');
        if( $startingGov !== null ){
            $qb->innerJoin('v.idDepart','ld');
            $qb->innerJoin('ld.idDelegation','dd');
            $qb->innerJoin('dd.idGouvernorat','gd', QueryExpr\Join::WITH, 'gd.id = '.$startingGov);
        }elseif( $startingDel !== null ){
            $qb->innerJoin('v.idDepart','ld');
            $qb->innerJoin('ld.idDelegation','dd', QueryExpr\Join::WITH, 'dd.id ='.$startingDel);
        }elseif( $startingLoc !== null )
            $qb->andWhere('v.idLocalite='.$startingLoc);
        if( $arrivingGov !== null ){
            $qb->innerJoin('v.idArrive','la');
            $qb->innerJoin('la.idDelegation','da');
            $qb->innerJoin('da.idGouvernorat','ga', QueryExpr\Join::WITH, 'ga.id = '.$arrivingGov);
        }elseif( $arrivingDel !== null ){
            $qb->innerJoin('v.idDepart','la');
            $qb->innerJoin('la.idDelegation','da', QueryExpr\Join::WITH, 'da.id = '.$arrivingDel);
        }elseif( $arrivingLoc !== null )
            $qb->andWhere("'v.idLocalite='".$arrivingLoc."'");
        if( $horaire !== null )
            $qb->andWhere("v.horaire='".$horaire."'");
        if( $nbPlace !== null )
            $qb->andWhere("v.nbPlace='".$nbPlace."'");

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