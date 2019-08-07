<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

final class ServicioAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            ->add('nombre')
            ->add('descripcion')
            ->add('icono')
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('nombre')
            ->add('icono')
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
            ->add('nombre')
            ->add('descripcion', CKEditorType::class)
            ->add('icono',  ChoiceType::class, [
                'choices' => [
                    htmlspecialchars_decode(stripslashes('<i class="flaticon-speed"></i>')) => 'flaticon-speed',
                    '<i class="flaticon-wheel"></i>' => 'flaticon-wheel',
                    '<i class="flaticon-air-conditioner"></i>' =>'flaticon-air-conditioner',
                    '<i class="flaticon-car-2"></i>' => 'flaticon-car-2',
                    '<i class="flaticon-car-1"></i>' => 'flaticon-car-1',
                    '<i class="flaticon-motor"></i>' => 'flaticon-motor',
                    '<i class="flaticon-deal"></i>' => 'flaticon-deal',
                    '<i class="flaticon-lock"></i>' => 'flaticon-lock',
                    '<i class="flaticon-support-2"></i>' => 'flaticon-support-2',
                ],
            ])
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
            ->add('nombre')
            ->add('descripcion')
            ->add('icono')
            ;
    }
}
