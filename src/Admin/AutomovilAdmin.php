<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Marca;
use App\Entity\Cambio;
use App\Entity\Combustible;
use App\Entity\Condicion;
use App\Entity\Estado;
use App\Entity\Automovil;
use Symfony\Component\Form\Extension\Core\Type\FileType;

final class AutomovilAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            ->add('marca')
            ->add('modelo')
            ->add('destacado')
            ->add('oferta')
            ->add('activo')
            ->add('cambio')
            ->add('combustible')
            ->add('estado')
            ->add('precio')
            ->add('anio', null, ['label' => 'Año'])
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
            ->add('marca')
            ->add('modelo')
            ->add('destacado')
            ->add('cambio')
            ->add('combustible')
            ->add('estado')
            ->add('precio')
            ->add('oferta')
            ->add('anio', null, ['label' => 'Año'])
            ->add('color')
            ->add('activo')
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
            ->add('activo')
            ->add('marca', EntityType::class, [
                'class' => Marca::class,
                'choice_label' => 'nombre',
            ])
            ->add('modelo')
            ->add('cambio', EntityType::class, [
                'class' => Cambio::class,
                'choice_label' => 'tipo',
            ])
            ->add('combustible', EntityType::class, [
                'class' => Combustible::class,
                'choice_label' => 'tipo',
            ])
            ->add('color')
            ->add('plazas')
            ->add('puertas')
            ->add('anio', null, ['label' => 'Año'])
            ->add('kilometraje')
            ->add('potencia')
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
            ->add('oferta')
            ->add('descripcion', CKEditorType::class, array(
            ))
        ->end()
        ->with('Multimedia', ['class' =>'col-md-4'])
            ->add('imagen_destacada', ModelListType::class, $imagen)
            ->add('destacado')
            ->add('video', ModelListType::class, $video)
            ->add('brochure', FileType::class, [
                'mapped' =>false,
                'required' => false,
                'label' => 'Galería de imágenes ficha de Automóvil',
                'help' => 'Las imágenes deben ser apaisadas u horizontales (1900x900). Actualice para guardar nuevas imágenes',
                'multiple' => true
            ])
        ->end()
        ->add('relacionados', EntityType::class, [
            'class' => Automovil::class,
            'multiple'=> true,
            'by_reference' => false,
        ])
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

    protected $datagridValues = array(
        '_sort_order' => 'DESC',
        '_sort_by' => 'id',
    );
}
