<?php
/**
 * User: Jordan Samouh | lifeextension25@gmail.com
 * Date: 13/11/13
 * Time: 13:35
 */

namespace P2A\MainBundle\Admin;



use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ArticleAdmin extends Admin
{

    protected $baseRouteName = 'article';
    protected $baseRoutePattern = 'articles';
    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title', null, array('label' => 'Titre'))
            ->add('blockName', null, array('label' => 'Nom du block'))
        ;

    }

    /**
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $filterMapper)
    {
        $filterMapper
            ->add('title', null, array('label' => 'Titre'))
            ->add('blockName', null, array('label' => 'Nom du block'))
        ;
    }



    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General')
            ->add('title', null, array('label' => 'Titre'))
            ->add('titleEn', null, array('label' => 'Titre Anglais'))
            ->add('description', 'textarea', array( 'label' => 'Description', 'attr' => array('data-theme' => 'advanced', 'class' => 'tinymce')))
            ->add('descriptionEn', 'textarea', array( 'label' => 'Description Anglais', 'attr' => array('data-theme' => 'advanced', 'class' => 'tinymce')))
            ->add('shortDescription', 'textarea', array( 'label' => 'Description Courte pour page Accueuil'))
            ->add('shortDescriptionEn', 'textarea', array( 'label' => 'Description Courte pour page Accueuil en Anglais'))
            ->add('blockName', 'choice', array('label' => 'Nom du block',  'required' => false, 'choices' => array('home' => 'Page accueuil', 'clients' => 'Clients', 'candidats' => 'Candidats', 'p2a' => 'P2A Recruitment', 'contact' => 'Contact', 'evolve' => 'Evoluer au Luxembourg')))
            ->end()
        ;
    }
}
