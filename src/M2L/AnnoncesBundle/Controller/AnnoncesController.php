<?php 

namespace M2L\AnnoncesBundle\Controller;

use M2L\AnnoncesBundle\Entity\annonces;
use M2L\AnnoncesBundle\Form\annoncesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AnnoncesController extends Controller {

	public function indexAction(){
		$em = $this->getDoctrine()->getManager();

		$listeAnnonces = $em->getRepository("M2LAnnoncesBundle:annonces")->findAll();

		return $this->render("M2LAnnoncesBundle:Annonces:index.html.twig", array(
			"listeAnnonces"	=>	$listeAnnonces
			));
	}

	public function viewAction($id) {
		$em = $this->getDoctrine()->getManager();

		$annonce = $em->getRepository("M2LAnnoncesBundle:annonces")->find($id);

		if (null === $annonce) {
	    	throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
	    }

		return $this->render("M2LAnnoncesBundle:Annonces:viewAnnonce.html.twig", array(
			"annonce"	=>	$annonce
			));
	}

	public function addAction(Request $request) {
		$annonce = new Annonces();

		$form = $this->get("form.factory")->create(new annoncesType(), $annonce);

		if ($request->isMethod("POST")) {

			$annonce->setTitre();
			$annonce->setDescription();
			$annonce->setSport();

			return $this->redirect($this->generateUrl("m2l_annonces_view", array(
				"id"	=>	$annonce->getId()
				)));
		}

		return $this->render("M2LAnnoncesBundle:Annonces:addAnnonce.html.twig", array(
			"form"	=>	$form->createView()
			));
	}

	public function userAnnoncesAction() {

		return $this->render("M2LAnnoncesBundle:Annonces:userAnnonces.html.twig", array());

	}

}

?>
