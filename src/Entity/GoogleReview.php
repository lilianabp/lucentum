<?php

namespace App\Entity;

use App\Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GoogleReviewRepository")
 */
class GoogleReview
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
    private $opinion;

    /**
     * @ORM\Column(type="integer")
     */
    private $rating;

    /**
     * @ORM\Column(type="integer")
     */
    private $opiniones;

    /**
     * @ORM\OneToOne(targetEntity="App\Application\Sonata\MediaBundle\Entity\Media", cascade={"persist", "remove"})
     */
    private $imagen;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre_completo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOpinion(): ?string
    {
        return $this->opinion;
    }

    public function setOpinion(string $opinion): self
    {
        $this->opinion = $opinion;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getOpiniones(): ?int
    {
        return $this->opiniones;
    }

    public function setOpiniones(int $opiniones): self
    {
        $this->opiniones = $opiniones;

        return $this;
    }

    public function getImagen(): ?Media
    {
        return $this->imagen;
    }

    public function setImagen(?Media $imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function getNombreCompleto(): ?string
    {
        return $this->nombre_completo;
    }

    public function setNombreCompleto(string $nombre_completo): self
    {
        $this->nombre_completo = $nombre_completo;

        return $this;
    }
}
