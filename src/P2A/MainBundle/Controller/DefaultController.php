<?php

namespace P2A\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }


    /**
     * @Route("/article/{block}.html", name="view_page")
     * @Template("P2AMainBundle:Default:view.html.twig")
     */
    public function viewAction($block)
    {
        $article = $this->getDoctrine()->getRepository("P2AMainBundle:Article")->findOneBy(array('blockName' => $block));

        return array('article' => $article);
    }


    /**
     * @Route("/short-description", name="short_description")
     * @Template("P2AMainBundle:Default:short.html.twig")
     */
    public function shortDescriptionAction($block)
    {

        $article = $this->getDoctrine()->getRepository("P2AMainBundle:Article")->findOneBy(array('blockName' => $block));

        return array('article' => $article);
    }
}
