<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PoliticaPrivacidadRepository")
 */
class PoliticaPrivacidad
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
    private $titulo;

    /**
     * @ORM\Column(type="text")
     */
    private $politica_privacidad;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPoliticaPrivacidad(): ?string
    {
        return $this->politica_privacidad;
    }

    public function setPoliticaPrivacidad(string $politica_privacidad): self
    {
        $this->politica_privacidad = $politica_privacidad;

        return $this;
    }
}
