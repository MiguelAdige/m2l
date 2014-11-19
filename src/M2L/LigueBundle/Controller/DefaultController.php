<?php

namespace M2L\LigueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('M2LLigueBundle:Default:index.html.twig', array('name' => $name));
    }
}
