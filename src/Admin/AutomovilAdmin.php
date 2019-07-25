<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class AutomovilAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            ->add('modelo')
            ->add('precio')
            ->add('anio')
            ->add('kilometraje')
            ->add('color')
            ->add('plazas')
            ->add('puertas')
            ->add('descripcion')
            ->add('fecha_alta')
            ->add('fecha_reserva')
            ->add('fecha_venta')
            ->add('fecha_modificacion')
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('id')
            ->add('modelo')
            ->add('precio')
            ->add('anio')
            ->add('kilometraje')
            ->add('color')
            ->add('plazas')
            ->add('puertas')
            ->add('descripcion')
            ->add('fecha_alta')
            ->add('fecha_reserva')
            ->add('fecha_venta')
            ->add('fecha_modificacion')
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
            ->add('id')
            ->add('modelo')
            ->add('precio')
            ->add('anio')
            ->add('kilometraje')
            ->add('color')
            ->add('plazas')
            ->add('puertas')
            ->add('descripcion')
            ->add('fecha_alta')
            ->add('fecha_reserva')
            ->add('fecha_venta')
            ->add('fecha_modificacion')
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
            ->add('modelo')
            ->add('precio')
            ->add('anio')
            ->add('kilometraje')
            ->add('color')
            ->add('plazas')
            ->add('puertas')
            ->add('descripcion')
            ->add('fecha_alta')
            ->add('fecha_reserva')
            ->add('fecha_venta')
            ->add('fecha_modificacion')
            ;
    }
}
