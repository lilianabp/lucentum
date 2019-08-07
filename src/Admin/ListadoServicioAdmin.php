<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;

final class ListadoServicioAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            ->add('titulo')
            ->add('subtitulo')
            ->add('metatitle')
            ->add('metadescription')
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('id')
            ->add('titulo')
            ->add('subtitulo')
            ->add('metatitle')
            ->add('metadescription')
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
        $imagen = [
            'btn_edit' => true,
            'btn_delete' => true,
            'btn_list' => false,
            'label'=> 'Banner de sección',
        ];
        $formMapper
            ->add('titulo')
            ->add('subtitulo')
            ->add('banner', ModelListType::class, $imagen)
            ->add('metatitle')
            ->add('metadescription')
            ->add('comentarios_titulo')
            ->add('comentario_subtitulo')
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
            ->add('titulo')
            ->add('subtitulo')
            ->add('metatitle')
            ->add('metadescription')
            ;
    }
}
