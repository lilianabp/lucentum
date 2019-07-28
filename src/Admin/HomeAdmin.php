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

final class HomeAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('title')
            ->add('subtitle')
            ->add('video')
            ->add('titulo_grid_automoviles')
            ->add('subtitulo_grid_automoviles')
            ->add('seo_titulo')
            ->add('seo_subtitulo')
            ->add('seguridad_title')
            ->add('seguridad_descripcion')
            ->add('confianza_descripcion')
            ->add('oferta_titulo')
            ->add('oferta_descripcion')
            ->add('servicio_titlulo')
            ->add('servicio_descripcion')
            ->add('ofertas_titulo')
            ->add('ofertas_subtitulo')
            ->add('comentarios_titulo')
            ->add('comentarios_subtitulo')
            ->add('noticias_titulo')
            ->add('noticias_subtitulo')
            ->add('confianza_titulo')
            ->add('metatitle')
            ->add('metadescription')
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('title')
            ->add('subtitle')
            ->add('video')
            ->add('titulo_grid_automoviles')
            ->add('subtitulo_grid_automoviles')
            ->add('seo_titulo')
            ->add('seo_subtitulo')
            ->add('seguridad_title')
            ->add('seguridad_descripcion')
            ->add('confianza_descripcion')
            ->add('oferta_titulo')
            ->add('oferta_descripcion')
            ->add('servicio_titlulo')
            ->add('servicio_descripcion')
            ->add('ofertas_titulo')
            ->add('ofertas_subtitulo')
            ->add('comentarios_titulo')
            ->add('comentarios_subtitulo')
            ->add('noticias_titulo')
            ->add('noticias_subtitulo')
            ->add('confianza_titulo')
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
        $video = [
            'btn_edit' => true,
            'btn_delete' => true,
            'btn_list' => false,
            'label'=> 'Video banner home',
        ];

        $formMapper
        ->with('Sección Video', ['class' => 'col-md-3'] )
            ->add('title')
            ->add('subtitle')
            ->add('video', ModelListType::class, $video)
        ->end()
        ->with('Sección Destacados', ['class' => 'col-md-3'])
            ->add('titulo_grid_automoviles')
            ->add('subtitulo_grid_automoviles')
        ->end()
                ->with('Ofertas', ['class' => 'col-md-3'])
            ->add('ofertas_titulo')
            ->add('ofertas_subtitulo')
        ->end()
        ->with('Comentarios', ['class' => 'col-md-3'])
            ->add('comentarios_titulo')
            ->add('comentarios_subtitulo')
        ->end()
        ->with('Novedades', ['class' => 'col-md-3'])
            ->add('noticias_titulo')
            ->add('noticias_subtitulo')
        ->end() 
        ->with('Metadata', ['class' => 'col-md-3'])
            ->add('metatitle')
            ->add('metadescription')
        ->end()
        ->with('Sección SEO', ['class' => 'col-md-3'])
            ->add('seo_titulo')
            ->add('seo_subtitulo')
        ->end()
        ->with('Sección SEO - Seguridad', ['class' => 'col-md-3'])
            ->add('seguridad_title')
            ->add('seguridad_descripcion', CKEditorType::class, array(
            ))
        ->end()
        ->with('Sección SEO - Confianza', ['class' => 'col-md-3'])
            ->add('confianza_titulo')
            ->add('confianza_descripcion', CKEditorType::class, array(
            ))
        ->end()
        ->with('Sección SEO - Ofertas', ['class' => 'col-md-3'])
            ->add('oferta_titulo')
            ->add('oferta_descripcion', CKEditorType::class, array(
            ))
        ->end()
        ->with('Sección SEO - Servicios', ['class' => 'col-md-3'])
            ->add('servicio_titlulo')
            ->add('servicio_descripcion', CKEditorType::class, array(
            ))
        ->end()
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
            ->add('title')
            ->add('subtitle')
            ->add('video')
            ->add('titulo_grid_automoviles')
            ->add('subtitulo_grid_automoviles')
            ->add('seo_titulo')
            ->add('seo_subtitulo')
            ->add('seguridad_title')
            ->add('seguridad_descripcion')
            ->add('confianza_descripcion')
            ->add('oferta_titulo')
            ->add('oferta_descripcion')
            ->add('servicio_titlulo')
            ->add('servicio_descripcion')
            ->add('ofertas_titulo')
            ->add('ofertas_subtitulo')
            ->add('comentarios_titulo')
            ->add('comentarios_subtitulo')
            ->add('noticias_titulo')
            ->add('noticias_subtitulo')
            ->add('confianza_titulo')
            ->add('metatitle')
            ->add('metadescription')
            ;
    }
}
