<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CambioRepository")
 */
class Cambio
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
    private $tipo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Automovil", mappedBy="cambio")
     */
    private $automoviles;

    public function __toString() {
        return $this->tipo;
    }

    public function __construct()
    {
        $this->automoviles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * @return Collection|Automovil[]
     */
    public function getautomoviles(): Collection
    {
        return $this->automoviles;
    }

    public function addAutomovil(Automovil $automovil): self
    {
        if (!$this->automoviles->contains($automovil)) {
            $this->automoviles[] = $automovil;
            $automovil->setCambio($this);
        }

        return $this;
    }

    public function removeAutomovil(Automovil $automovil): self
    {
        if ($this->automoviles->contains($automovil)) {
            $this->automoviles->removeElement($automovil);
            // set the owning side to null (unless already changed)
            if ($automovil->getCambio() === $this) {
                $automovil->setCambio(null);
            }
        }

        return $this;
    }
}
