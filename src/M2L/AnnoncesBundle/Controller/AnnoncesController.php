<?php 

namespace M2L\AnnoncesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AnnoncesController extends Controller {

	public function indexAction(){

		return $this->render("M2LAnnoncesBundle:Annonces:index.html.twig", array());
	}

	public function viewAction() {

		return $this->render("M2LAnnoncesBundle:Annonces:viewAnnonces.html.twig", array());

	}

}

?>
