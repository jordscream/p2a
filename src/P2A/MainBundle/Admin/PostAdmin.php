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

class PostAdmin extends Admin
{

    protected $baseRouteName = 'post_offer';
    protected $baseRoutePattern = 'post_offer';
    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title', null, array('label' => 'Titre'))
            ->add('category', null, array('label' => 'Categorie'))
            ->add('location', null, array('label' => 'Localisation'))
            ->add('typeContrat', null, array('label' => 'Type de contrat'))
        ;

    }

    /**
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $filterMapper)
    {
        $filterMapper
            ->add('title', null, array('label' => 'Titre'))
            ->add('category', null, array('label' => 'Categorie'))
            ->add('location', null, array('label' => 'Localisation'))
            ->add('typeContrat', null, array('label' => 'Type de contrat'))
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
            ->end()
            ->with('Information Complémentaires')
                ->add('salaire', null, array('label' => 'Salaire'))
                ->add('dateStart', 'date', array('label' => 'Date Debut contrat'))
                ->add('contact', 'text', array('label' => 'Contact'))
                ->add('responsability', 'textarea', array('label' => 'Responsabilité', 'attr' => array('data-theme' => 'advanced', 'class' => 'tinymce')))
                ->add('responsabilityEn', 'textarea', array('label' => 'Responsabilité Anglais', 'attr' => array('data-theme' => 'advanced', 'class' => 'tinymce')))
                ->add('profil', 'textarea', array( 'label' => 'Profil', 'attr' => array('data-theme' => 'advanced', 'class' => 'tinymce')))
                ->add('profilEn', 'textarea', array( 'label' => 'Profil Anglais', 'attr' => array('data-theme' => 'advanced', 'class' => 'tinymce')))
            ->with('Information Contrat')
            ->add('typeContrat', 'choice', array('label' => 'Type de contrat', 'choices' => array('CDI' => 'CDI', 'CDD' => 'CDD', 'Intérim' => 'Intérim', 'Emploi formation' => 'Emploi formation', 'Stage' => 'Stage', 'Autres' => 'Autres')))
            ->add('category', null, array('label' => 'Category'))
            ->add('location', null, array('label' => 'Lieu'))
            ->end()
        ;
    }
}
