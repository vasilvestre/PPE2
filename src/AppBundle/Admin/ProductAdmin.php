<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ProductAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper ->with('Product')
            ->add('code','text')
            ->add('name', 'text')
            ->add('priceHt','text')
            ->add('image','text')
            ->add('comment', 'textarea')
            ->add('productCategorie','choice')
            ->end()

            ->add('promotion', 'sonata_type_model', array(
                'class' => 'AppBundle\Entity\Promotion',
                'property' => 'name',
            ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name')
                    ->add('priceHT');
    }
}