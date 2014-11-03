<?php
/**
 *
 * User: wissem
 * Date: 03/11/2014
 * Time: 23:30
 * Email: wissemr@gmail.com
 */

namespace Covoiturage\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;



class VoyageController extends Controller
{
    public function publishAction()
    {

        return $this->render('CovoiturageFrontendBundle:Voyage:publish.html.twig');
    }


}
