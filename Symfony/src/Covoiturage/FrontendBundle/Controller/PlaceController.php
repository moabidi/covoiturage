<?php
/**
 * Created by PhpStorm.
 * User: m.abidi
 * Date: 17/10/14
 * Time: 14:20
 */

namespace Covoiturage\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\Expr;
use Doctrine\Common\Collections\Criteria;

class PlaceController extends Controller{

    /**************** List gouvernorats **********************/
    /**
     * @param Request $request
     * @return Response
     */
    public function getGouvernoratsAction(Request $request)
    {
        $idPays = $request->request->get('idPays');
        if (is_numeric($idPays)){
            $pays = $this->getDoctrine()->getRepository('CovoiturageFrontendBundle:Pays')->find($idPays);
            $listGouvernorats = $pays->getGouvernorats();
        }else{
            $listGouvernorats = $this->getDoctrine()->getRepository('CovoiturageFrontendBundle:Gouvernorat')->findAll();
        }
        return $this->render('CovoiturageFrontendBundle:_common:list_options.html.twig', array(
            'list_options' => $listGouvernorats,
            'select_field' => 'gouvernorat'
        ));
    }

    /**************** List delegations **********************/
    /**
     * @param Request $request
     * @return Response
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function getDelegationsAction(Request $request)
    {
        $idGouvernorat = $request->request->get('idPays');
        if (is_numeric($idGouvernorat)){
            $listDelegations = $this->getDoctrine()->getRepository('CovoiturageFrontendBundle:Delegation')->matching( new Criteria( new Expr\Comparison( "idGouvernorat",Expr\Comparison::EQ,$idGouvernorat)));
            return $this->render('CovoiturageFrontendBundle:_common:list_options.html.twig', array(
                'list_options' => $listDelegations,
                'select_field' => 'delegation'
            ));
        }else{
            throw $this->createNotFoundException(' id doit etre de type entier : '.$idGouvernorat);
        }
    }
    /**************** List localites **********************/
    /**
     * @param Request $request
     * @return Response
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function getLocationsAction(Request $request)
    {
        $idDelegation = $request->request->get('idPays');
        if (is_numeric($idDelegation)){
            $listDelegations = $this->getDoctrine()->getRepository('CovoiturageFrontendBundle:Localite')->matching( new Criteria( new Expr\Comparison( "idDelegation",Expr\Comparison::EQ,$idDelegation)));
            return $this->render('CovoiturageFrontendBundle:_common:list_options.html.twig', array(
                'list_options' => $listDelegations,
                'select_field' => 'localite'
            ));
        }else{
            throw $this->createNotFoundException(' id doit etre de type entier : '.$idDelegation);
        }
    }

}