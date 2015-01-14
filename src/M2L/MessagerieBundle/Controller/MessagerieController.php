<?php

namespace M2L\MessagerieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MessagerieController extends Controller
{
    public function indexAction()
    {
        return $this->render('MessagerieBundle:Messagerie:index.html.twig', array());
    }

    public function NewMessageAction()
    {
    	return $this->render('MessagerieBundle:Messagerie:form.html.twig', array());
    }
}
