<?php

namespace App\Entity;

use App\Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HomeRepository")
 */
class Home
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $subtitle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titulo_grid_automoviles;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $subtitulo_grid_automoviles;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $seo_titulo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $seo_subtitulo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $seguridad_title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $seguridad_descripcion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $confianza_descripcion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $oferta_titulo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $oferta_descripcion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $servicio_titlulo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $servicio_descripcion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ofertas_titulo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ofertas_subtitulo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $comentarios_titulo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $comentarios_subtitulo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $noticias_titulo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $noticias_subtitulo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $confianza_titulo;

    /**
     * @ORM\OneToOne(targetEntity="App\Application\Sonata\MediaBundle\Entity\Media", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $seo_banner;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $metatitle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $metadescription;

    /**
     * @ORM\OneToOne(targetEntity="App\Application\Sonata\MediaBundle\Entity\Media", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $video;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function setSubtitle(string $subtitle): self
    {
        $this->subtitle = $subtitle;

        return $this;
    }


    public function getTituloGridAutomoviles(): ?string
    {
        return $this->titulo_grid_automoviles;
    }

    public function setTituloGridAutomoviles(string $titulo_grid_automoviles): self
    {
        $this->titulo_grid_automoviles = $titulo_grid_automoviles;

        return $this;
    }

    public function getSubtituloGridAutomoviles(): ?string
    {
        return $this->subtitulo_grid_automoviles;
    }

    public function setSubtituloGridAutomoviles(string $subtitulo_grid_automoviles): self
    {
        $this->subtitulo_grid_automoviles = $subtitulo_grid_automoviles;

        return $this;
    }

    public function getSeoTitulo(): ?string
    {
        return $this->seo_titulo;
    }

    public function setSeoTitulo(string $seo_titulo): self
    {
        $this->seo_titulo = $seo_titulo;

        return $this;
    }

    public function getSeoSubtitulo(): ?string
    {
        return $this->seo_subtitulo;
    }

    public function setSeoSubtitulo(string $seo_subtitulo): self
    {
        $this->seo_subtitulo = $seo_subtitulo;

        return $this;
    }

    public function getSeguridadTitle(): ?string
    {
        return $this->seguridad_title;
    }

    public function setSeguridadTitle(string $seguridad_title): self
    {
        $this->seguridad_title = $seguridad_title;

        return $this;
    }

    public function getSeguridadDescripcion(): ?string
    {
        return $this->seguridad_descripcion;
    }

    public function setSeguridadDescripcion(string $seguridad_descripcion): self
    {
        $this->seguridad_descripcion = $seguridad_descripcion;

        return $this;
    }

    public function getConfianzaDescripcion(): ?string
    {
        return $this->confianza_descripcion;
    }

    public function setConfianzaDescripcion(string $confianza_descripcion): self
    {
        $this->confianza_descripcion = $confianza_descripcion;

        return $this;
    }

    public function getOfertaTitulo(): ?string
    {
        return $this->oferta_titulo;
    }

    public function setOfertaTitulo(string $oferta_titulo): self
    {
        $this->oferta_titulo = $oferta_titulo;

        return $this;
    }

    public function getOfertaDescripcion(): ?string
    {
        return $this->oferta_descripcion;
    }

    public function setOfertaDescripcion(string $oferta_descripcion): self
    {
        $this->oferta_descripcion = $oferta_descripcion;

        return $this;
    }

    public function getServicioTitlulo(): ?string
    {
        return $this->servicio_titlulo;
    }

    public function setServicioTitlulo(string $servicio_titlulo): self
    {
        $this->servicio_titlulo = $servicio_titlulo;

        return $this;
    }

    public function getServicioDescripcion(): ?string
    {
        return $this->servicio_descripcion;
    }

    public function setServicioDescripcion(string $servicio_descripcion): self
    {
        $this->servicio_descripcion = $servicio_descripcion;

        return $this;
    }

    public function getOfertasTitulo(): ?string
    {
        return $this->ofertas_titulo;
    }

    public function setOfertasTitulo(string $ofertas_titulo): self
    {
        $this->ofertas_titulo = $ofertas_titulo;

        return $this;
    }

    public function getOfertasSubtitulo(): ?string
    {
        return $this->ofertas_subtitulo;
    }

    public function setOfertasSubtitulo(string $ofertas_subtitulo): self
    {
        $this->ofertas_subtitulo = $ofertas_subtitulo;

        return $this;
    }

    public function getComentariosTitulo(): ?string
    {
        return $this->comentarios_titulo;
    }

    public function setComentariosTitulo(string $comentarios_titulo): self
    {
        $this->comentarios_titulo = $comentarios_titulo;

        return $this;
    }

    public function getComentariosSubtitulo(): ?string
    {
        return $this->comentarios_subtitulo;
    }

    public function setComentariosSubtitulo(string $comentarios_subtitulo): self
    {
        $this->comentarios_subtitulo = $comentarios_subtitulo;

        return $this;
    }

    public function getNoticiasTitulo(): ?string
    {
        return $this->noticias_titulo;
    }

    public function setNoticiasTitulo(string $noticias_titulo): self
    {
        $this->noticias_titulo = $noticias_titulo;

        return $this;
    }

    public function getNoticiasSubtitulo(): ?string
    {
        return $this->noticias_subtitulo;
    }

    public function setNoticiasSubtitulo(string $noticias_subtitulo): self
    {
        $this->noticias_subtitulo = $noticias_subtitulo;

        return $this;
    }

    public function getConfianzaTitulo(): ?string
    {
        return $this->confianza_titulo;
    }

    public function setConfianzaTitulo(string $confianza_titulo): self
    {
        $this->confianza_titulo = $confianza_titulo;

        return $this;
    }

    public function getSeoBanner(): ?Media
    {
        return $this->seo_banner;
    }

    public function setSeoBanner(Media $seo_banner): self
    {
        $this->seo_banner = $seo_banner;

        return $this;
    }

    public function getMetatitle(): ?string
    {
        return $this->metatitle;
    }

    public function setMetatitle(string $metatitle): self
    {
        $this->metatitle = $metatitle;

        return $this;
    }

    public function getMetadescription(): ?string
    {
        return $this->metadescription;
    }

    public function setMetadescription(string $metadescription): self
    {
        $this->metadescription = $metadescription;

        return $this;
    }

    public function getVideo(): ?Media
    {
        return $this->video;
    }

    public function setVideo(Media $video): self
    {
        $this->video = $video;

        return $this;
    }
}
