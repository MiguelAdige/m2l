<?php

namespace M2L\AnnoncesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('M2LAnnoncesBundle:Default:index.html.twig', array('name' => $name));
    }
}
