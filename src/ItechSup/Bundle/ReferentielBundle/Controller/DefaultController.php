<?php

namespace ItechSup\Bundle\ReferentielBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
    	$uvs = $this->getDoctrine()->getRepository('ItechSupReferentielBundle:UniteValeur')->findAll();

        return $this->render(
        	'ItechSupReferentielBundle:Default:index.html.twig',
        	array('uvs' => $uvs)
        );
    }
}
