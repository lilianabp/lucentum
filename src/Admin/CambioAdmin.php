<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class CambioAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('tipo')
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('tipo')
            ->add('_action', null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ]);
    }

    protected function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
            ->add('tipo')
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
            ->add('tipo')
            ;
    }
}
