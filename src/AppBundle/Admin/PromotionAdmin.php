<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\CollectionType;

class PromotionAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->with('Promotion')
            ->add('name','text')
            ->add('taux', 'text')
            ->add('dateCreation','date')
            ->add('dateEnd','date')
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('taux');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('taux')
                    ->add('name');
    }
}