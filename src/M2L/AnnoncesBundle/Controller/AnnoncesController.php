<?php 

namespace M2L\AnnoncesBundle\Controller;

use M2L\AnnoncesBundle\Entity\annonces;
use M2L\AnnoncesBundle\Form\annoncesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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

		if ($form->handleRequest($request)->isValid()) {
			$em = $this->getDoctrine->getManager();

			$em
		}

		return $this->render("M2LAnnoncesBundle:Annonces:addAnnonce.html.twig", array(
			"form"	=>	$form->createView()
			));
	}

}

?>
