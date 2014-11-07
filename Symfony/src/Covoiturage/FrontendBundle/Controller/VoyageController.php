<?php
/**
 *
 * User: wissem
 * Date: 03/11/2014
 * Time: 23:30
 * Email: wissemr@gmail.com
 */

namespace Covoiturage\FrontendBundle\Controller;

use Covoiturage\FrontendBundle\Entity\Voyage;
use Covoiturage\FrontendBundle\Form\Type\VoyageType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;



class VoyageController extends Controller
{
    public function publishAction(Request $request)
    {
        $voyage = new Voyage();

        $form = $this->get('form.factory')->create(new VoyageType(), $voyage);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($voyage);
            $em->flush();

            //TODO:
            // add session message
            // redirect to Voyage view
        }

        return $this->render('CovoiturageFrontendBundle:Voyage:publish.html.twig',
                    array(
                        'form' => $form->createView()
                    )
        );
    }


}
