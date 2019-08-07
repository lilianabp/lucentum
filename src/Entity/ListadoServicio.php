<?php

namespace App\Entity;

use App\Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ListadoServicioRepository")
 */
class ListadoServicio
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Application\Sonata\MediaBundle\Entity\Media", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $banner;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titulo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $subtitulo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $metatitle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $metadescription;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $comentarios_titulo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comentario_subtitulo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBanner(): ?Media
    {
        return $this->banner;
    }

    public function setBanner(Media $banner): self
    {
        $this->banner = $banner;

        return $this;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getSubtitulo(): ?string
    {
        return $this->subtitulo;
    }

    public function setSubtitulo(string $subtitulo): self
    {
        $this->subtitulo = $subtitulo;

        return $this;
    }

    public function getMetatitle(): ?string
    {
        return $this->metatitle;
    }

    public function setMetatitle(?string $metatitle): self
    {
        $this->metatitle = $metatitle;

        return $this;
    }

    public function getMetadescription(): ?string
    {
        return $this->metadescription;
    }

    public function setMetadescription(?string $metadescription): self
    {
        $this->metadescription = $metadescription;

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

    public function getComentarioSubtitulo(): ?string
    {
        return $this->comentario_subtitulo;
    }

    public function setComentarioSubtitulo(?string $comentario_subtitulo): self
    {
        $this->comentario_subtitulo = $comentario_subtitulo;

        return $this;
    }
}
