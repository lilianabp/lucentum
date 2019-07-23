<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class PostAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('title')
            ->add('abstract')
            ->add('content')
            ->add('rawContent')
            ->add('contentFormatter')
            ->add('enabled')
            ->add('slug')
            ->add('publicationDateStart')
            ->add('commentsEnabled')
            ->add('commentsCloseAt')
            ->add('commentsDefaultStatus')
            ->add('commentsCount')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('id')
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('title')
            ->add('abstract')
            ->add('content')
            ->add('rawContent')
            ->add('contentFormatter')
            ->add('enabled')
            ->add('slug')
            ->add('publicationDateStart')
            ->add('commentsEnabled')
            ->add('commentsCloseAt')
            ->add('commentsDefaultStatus')
            ->add('commentsCount')
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
            ->add('title')
            ->add('abstract')
            ->add('content')
            ->add('rawContent')
            ->add('contentFormatter')
            ->add('enabled')
            ->add('slug')
            ->add('publicationDateStart')
            ->add('commentsEnabled')
            ->add('commentsCloseAt')
            ->add('commentsDefaultStatus')
            ->add('commentsCount')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('id')
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('title')
            ->add('abstract')
            ->add('content')
            ->add('rawContent')
            ->add('contentFormatter')
            ->add('enabled')
            ->add('slug')
            ->add('publicationDateStart')
            ->add('commentsEnabled')
            ->add('commentsCloseAt')
            ->add('commentsDefaultStatus')
            ->add('commentsCount')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('id')
            ;
    }
}
