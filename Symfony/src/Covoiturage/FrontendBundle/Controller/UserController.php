<?php
/**
 *
 * User: wissem
 * Date: 02/11/2014
 * Time: 22:10
 * Email: wissemr@gmail.com
 */

namespace Covoiturage\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;



class UserController extends Controller
{
    public function loginAction()
    {
        $csrfToken = $this->container->has('form.csrf_provider')
            ? $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate')
            : null;

        return $this->render('CovoiturageFrontendBundle:_common:login.html.twig',
                array(
                    'csrf' => $csrfToken,
                )
        );
    }


}
