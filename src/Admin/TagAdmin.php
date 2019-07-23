<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class TagAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('name')
            ->add('enabled')
            ->add('slug')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('id')
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('name')
            ->add('enabled')
            ->add('slug')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('id')
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
            ->add('name')
            ->add('enabled')
            ->add('slug')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('id')
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('name')
            ->add('enabled')
            ->add('slug')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('id')
            ;
    }
}
