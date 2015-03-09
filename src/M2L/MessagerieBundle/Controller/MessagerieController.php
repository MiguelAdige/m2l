<?php

namespace M2L\MessagerieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use M2L\MessagerieBundle\Entity\Messagerie;
use M2L\MessagerieBundle\Form\Type\MsgType;

class MessagerieController extends Controller
{
    public function indexAction($boite)
    {
        if (!$this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('m2l_ligue_homepage'));
        }

    	$user = $this->get('security.context')->getToken()->getUser();

    	$doctrine = $this->getDoctrine();
    	$em = $doctrine->getManager();


    	$repo = $em->getRepository('MessagerieBundle:Messagerie');

    	if ($boite == 1) {
    		$listMsg = $repo->findByDestinataire(array('destinataire' => $user->getUsername()));
    		return $this->render('MessagerieBundle:Messagerie:index.html.twig', array('list_msg' => $listMsg));
    	}
    	elseif ($boite == 2) {
    		$listMsg = $repo->findByExpedie(array('expedie' => $user->getUsername()));
    		return $this->render('MessagerieBundle:Messagerie:send.html.twig', array('list_msg' => $listMsg));
    	}
        
    }

    public function NewMessageAction(Request $request)
    {
        if (!$this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('m2l_ligue_homepage'));
        }

    	$messagerie = new Messagerie();
    	$form = $this->get('form.factory')->create(new MsgType(), $messagerie);
    	$user = $this->get('security.context')->getToken()->getUser();

    	$messagerie->setExpedie($user->getUsername());
    	$messagerie->setExpediteur($user->getUsername());

    	$form->handleRequest($request);

    	if ($form->isValid()) {
    		$doctrine = $this->getDoctrine();
    		$em = $doctrine->getManager();
    		$em->persist($messagerie);

    		if($em->flush())
    		{
    			$this->get('session')->getFlashBag()->add('notice', 'Message envoyé');
    		}

    		return $this->redirect($this->generateUrl("messagerie_homepage"));
    	}

    	return $this->render('MessagerieBundle:Messagerie:form.html.twig', array('form'	=> $form->createView()));
    }

    public function NewMessageUserAction(Request $request, $user)
    {
        if (!$this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('m2l_ligue_homepage'));
        }

    	$messagerie = new Messagerie();
    	$userSession = $this->get('security.context')->getToken()->getUser();
    	$messagerie->setDestinataire($user);
    	$form = $this->get('form.factory')->create(new MsgType(), $messagerie);
    	$form->handleRequest($request);

    	if ($form->isValid()) {
    		$doctrine = $this->getDoctrine();
    		$em = $doctrine->getManager();
    		$em->persist($messagerie);

    		$messagerie->setExpedie($userSession->getUsername());
    		$messagerie->setExpediteur($userSession->getUsername());

    		if($em->flush())
    		{
    			$this->get('session')->getFlashBag()->add('notice', 'Message envoyé');
    		}

    		return $this->redirect($this->generateUrl("messagerie_homepage"));
    	}

    	return $this->render('MessagerieBundle:Messagerie:form.html.twig', array('form'	=> $form->createView()));
    }

    public function viewAction($id)
    {
        if (!$this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('m2l_ligue_homepage'));
        }

    	$doctrine = $this->getDoctrine();
    	$em = $doctrine->getManager();


    	$repo = $em->getRepository('MessagerieBundle:Messagerie');
    	$Msg = $repo->findOneById(array('id' => $id));

    	return $this->render('MessagerieBundle:Messagerie:view.html.twig', array("msg" => $Msg));
    }

    public function deleteAction()
    {

    }
}
