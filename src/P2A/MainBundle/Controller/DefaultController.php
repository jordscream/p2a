<?php

namespace P2A\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

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
     * @Route("/contact.html", name="contact")
     * @Template()
     */
    public function contactAction()
    {
        $message = \Swift_Message::newInstance()
            ->setSubject("Un demande de contact sur le site P2A")
            ->setFrom("noreply@p2arecruitment.com")
            ->setTo("cv@p2arecruitment.com")
            //->setTo("jordan.samouh@ylly.fr")
            ->setBody($this->renderView("P2AMainBundle:Default:mail2.html.twig", array('name' => $this->getRequest()->get('name'), 'email' => $this->getRequest()->get('email'), 'comment' => $this->getRequest()->get('comment'))), 'text/html')
        ;

        $this->get('mailer')->send($message);
        return new Response("1");
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
        $search = $this->getRequest()->get('search', '');
        $category = $this->getRequest()->get('category', '');
        $location = $this->getRequest()->get('location', '');
        $type = $this->getRequest()->get('type', '');

        $repository = $this->getDoctrine()->getRepository('P2AMainBundle:Post');
        $query = $repository->createQueryBuilder('p');

        $query
            ->where('1=1');

        if ($query && $search)
        $query
            ->andWhere("p.title LIKE :title")
            ->setParameter('title', "%".$search."%");

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
            ->orderBy('p.createdAt', 'DESC')
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

    /**
     * @Route("/postuler", name="postuler")
     * @Template("P2AMainBundle:Default:postuler.html.twig")
     */
    public function postulerAction()
    {
        $id = $this->getRequest()->get('id', null);

        if ($this->getRequest()->getMethod() == "POST")
        {
            $name = $this->getRequest()->get('name', '');
            $firstname = $this->getRequest()->get('firstname', '');
            $email = $this->getRequest()->get('email', '');
            $tel = $this->getRequest()->get('tel', '');
            $commentaire = $this->getRequest()->get('commentaire', '');


            $path = $this->get('kernel')->getRootDir() . '/../web/uploads/';

            $name1 = basename($_FILES['cv']['tmp_name']).".".substr(strrchr(basename($_FILES['cv']['name']),'.'),1);
            $name2 = basename($_FILES['motivation']['tmp_name']).".".substr(strrchr(basename($_FILES['motivation']['name']),'.'),1);

            move_uploaded_file($_FILES['cv']['tmp_name'], $path.$name1);
            move_uploaded_file($_FILES['motivation']['tmp_name'], $path.$name2);

            $message = \Swift_Message::newInstance()
                ->setSubject("Un candidat a postulé")
                ->setFrom("noreply@p2arecruitment.com")
                ->setTo("cv@p2arecruitment.com")
                //->setTo("jordan.samouh@ylly.fr")
                ->setBody($this->renderView("P2AMainBundle:Default:mail.html.twig", array('name1' => $name1, 'name2' => $name2, 'name' => $name, 'firstname' => $firstname, 'email' => $email, 'tel' => $tel, 'commentaire' => $commentaire)), 'text/html')
            ;

            $this->get('mailer')->send($message);
            return array('status' => 'ok');
        }

        return array('id' => $id);
    }

    /**
     * @Route("/last-post", name="last_post")
     * @Template("P2AMainBundle:Default:last_post.html.twig")
     */
    public function lastpostAction()
    {
        $posts = $this->getDoctrine()->getRepository("P2AMainBundle:Post")->findBy(array(), array('createdAt' => 'DESC'), 4);

        return array('posts' => $posts);
    }
}
