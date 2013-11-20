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

class LocationAdmin extends Admin
{

    protected $baseRouteName = 'location';
    protected $baseRoutePattern = 'location';
    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name', null, array('label' => 'Lieu'))
        ;

    }

    /**
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $filterMapper)
    {
        $filterMapper
            ->add('name', null, array('label' => 'Lieu'))
        ;
    }



    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General')
            ->add('name', null, array('label' => 'Lieu'))
            ->end()
        ;
    }
}
