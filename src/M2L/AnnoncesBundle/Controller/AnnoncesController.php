<?php 

namespace M2L\AnnoncesBundle\Controller;

use M2L\AnnoncesBundle\Entity\annonces;
use M2L\AnnoncesBundle\Form\annoncesType;
use M2L\UserBundle\Entity\User;
use M2L\LigueBundle\Entity\ligue;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AnnoncesController extends Controller {

	public function indexAction(){
		$em = $this->getDoctrine()->getManager();

		$users = $em->getRepository("M2LUserBundle:User")->findAll();
		$ligues = $em->getRepository("M2LLigueBundle:ligue")->findAll();

		$listeAnnonces = $em->getRepository("M2LAnnoncesBundle:annonces")->findBy(array("user"	=>	$users, "ligue"	=>	$ligues));
		
		return $this->render("M2LAnnoncesBundle:Annonces:index.html.twig", array(
			"listeAnnonces"	=>	$listeAnnonces
			));
	}

	public function viewAction($id) {

		if (!$this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl("login"));
        }

		$em = $this->getDoctrine()->getManager();

		$annonce = $em->getRepository("M2LAnnoncesBundle:annonces")->find($id);

		$user = $annonce->getUser();
		$ligue = $annonce->getLigue();

		if (null === $annonce) {
	    	throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
	    }

		return $this->render("M2LAnnoncesBundle:Annonces:viewAnnonce.html.twig", array(
			"annonce"	=>	$annonce,
			"user"		=>	$user,
			"ligue"		=>	$ligue
			));
	}

	public function addAction(Request $request) {

		if (!$this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl("login"));
        }

		$annonce = new Annonces();
		$user = $this->getUser();

		$form = $this->get("form.factory")->create(new annoncesType(), $annonce);

		if ($user != null) {
			if ($request->isMethod("POST")) {
				if ($form->handleRequest($request)) {
					$annonce->setUser($user);
					$em = $this->getDoctrine()->getManager();
					$em->persist($annonce);
					$em->flush();

					return $this->redirect($this->generateUrl("m2l_annonces_view", array(
						"id"	=>	$annonce->getId()
						)));
				}
			}
			return $this->render("M2LAnnoncesBundle:Annonces:addAnnonce.html.twig", array(
				"form"	=>	$form->createView()
				));			
		}

	}

	public function editAction($id, Request $request) {

		if (!$this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl("login"));
        }

		$annonce = new Annonces();
		$em = $this->getDoctrine()->getManager();
		$myAnnonce =  $em->getRepository("M2LAnnoncesBundle:Annonces")->find($id);;
		$user = $this->getUser();

		$form = $this->get("form.factory")->create(new annoncesType(), $myAnnonce);

		if ($request->isMethod("POST")) {
			if ($form->handleRequest($request)) {
				$annonce->setUser($user);
				$em->persist($myAnnonce);
				$em->flush();

				return $this->redirect($this->generateUrl("m2l_annonces_view", array(
					"id"	=>	$id
					)));
			}
		}
		return $this->render("M2LAnnoncesBundle:Annonces:editAnnonce.html.twig", array(
			"form"	=>	$form->createView()
			));			

	}

	public function userAnnoncesAction() {
		if (!$this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl("login"));
        }

		$user = $this->getUser();

		if ($user != null) {

			$em = $this->getDoctrine()->getManager();
         	$listeAnnonces = $em->getRepository("M2LAnnoncesBundle:annonces")->findBy(array("user"	=>	$user));

			return $this->render("M2LAnnoncesBundle:Annonces:userAnnonces.html.twig", array(
				"listeAnnonces"	=>	$listeAnnonces,
				"user"			=>	$user
				));

        }

	}

}

?>
