<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class HomeAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
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

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
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
