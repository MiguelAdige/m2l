<?php 

namespace M2L\AnnoncesBundle\Controller;

use M2L\AnnoncesBundle\Entity\annonces;
use M2L\AnnoncesBundle\Form\annoncesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AnnoncesController extends Controller {

	public function indexAction(){

		return $this->render("M2LAnnoncesBundle:Annonces:index.html.twig", array());
	}

	public function viewAction() {

		return $this->render("M2LAnnoncesBundle:Annonces:viewAnnonce.html.twig", array());
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
