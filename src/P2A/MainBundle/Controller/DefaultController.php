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

        $categories = $this->getDoctrine()->getRepository("P2AMainBundle:CategoryOffer")->findAll();
        $locations = $this->getDoctrine()->getRepository("P2AMainBundle:Location")->findAll();


        return array('article' => $article, 'categories' => $categories, 'locations' => $locations);
    }

    /**
     * @Route("/search/recherche.html", name="search")
     * @Template("P2AMainBundle:Default:search.html.twig")
     */
    public function searchAction()
    {
        $search = $this->getRequest('search', '');
        $category = $this->getRequest('category', '');
        $location = $this->getRequest('location', '');
        $type = $this->getRequest('type', '');

        $repository = $this->getDoctrine()->getRepository('P2AMainBundle:Post');
        $query = $repository->createQueryBuilder('p');

        $query
            ->where('1=1');

        if ($query && $search)
        $query
            ->andWhere("p.title LIKE :title")
            ->setParameter('title', "'%.".$search.".%'");

        if ($query && $category)
            $query
                ->leftJoin('p.category', 'c')
                ->andWhere("c.id = :c")
                ->setParameter('c', $category);

        if ($query && $location)
            $query
                ->leftJoin('p.location', 'l')
                ->andWhere("l.id = :l")
                ->setParameter('l', $location);

        if ($query && $type)
            $query
                ->andWhere("p.typeContrat = :t")
                ->setParameter('t', $type);

        $query
            ->orderBy('p.dateStart', 'ASC')
            ->getQuery();

        $posts = $query->getQuery()->getResult();

        return array('posts' => $posts);
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
