<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/store")
     */
    public function indexAction()
    {
        return $this->render('AcmeStoreBundle:Default:index.html.twig');
    }
}
