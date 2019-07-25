<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Marca;
use App\Entity\Cambio;
use App\Entity\Combustible;
use App\Entity\Condicion;
use App\Entity\Estado;

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
            ->add('modelo')
            ->add('precio')
            ->add('anio')
            ->add('kilometraje')
            ->add('color')
            ->add('plazas')
            ->add('puertas')
            ->add('fecha_alta')
            ->add('fecha_reserva')
            ->add('fecha_venta')
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
            'label'=> 'Imagen destacada para listados',
        ];
        $video = [
            'btn_edit' => true,
            'btn_delete' => true,
            'btn_list' => false,
            'label'=> 'Video ficha de Automóvil',
        ];
        $galeria = [
            'btn_edit' => true,
            'btn_delete' => true,
            'btn_list' => false,
            'label'=> 'Galería de imágenes ficha de Automóvil',
        ];
        $formMapper
        ->with('Especificaciones', ['class' => 'col-md-4'])
            ->add('marca', EntityType::class, [
                'class' => Marca::class,
                'choice_label' => 'nombre',
            ])
            ->add('modelo')
            ->add('cambio', EntityType::class, [
                'class' => Cambio::class,
                'choice_label' => 'nombre',
            ])
            ->add('combustible', EntityType::class, [
                'class' => Combustible::class,
                'choice_label' => 'nombre',
            ])
            ->add('color')
            ->add('plazas')
            ->add('puertas')
        ->end()
        ->with('Detalles', ['class' =>'col-md-4'])
            ->add('estado', EntityType::class, [
                'class' => Estado::class,
                'choice_label' => 'nombre',
            ])
            ->add('condicion', EntityType::class, [
                'class' => Condicion::class,
                'choice_label' => 'nombre',
            ])
            ->add('precio')
            ->add('anio', null, ['label' => 'Año'])
            ->add('kilometraje')
            ->add('descripcion', CKEditorType::class, array(
                'config' => array(
                    'uiColor' => '',
                    //...
                )
            ))
        ->end()
        ->with('Multimedia', ['class' =>'col-md-4'])
            ->add('imagen_destacada', ModelListType::class, $imagen)
            ->add('video', ModelListType::class, $video)
            ->add('galeria', ModelListType::class, $galeria)
        ->end()
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
