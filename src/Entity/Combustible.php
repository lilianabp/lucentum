<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CombustibleRepository")
 */
class Combustible
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
     * @ORM\OneToMany(targetEntity="App\Entity\Automovil", mappedBy="combustible")
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
    public function getAutomoviles(): Collection
    {
        return $this->automoviles;
    }

    public function addAutomovile(Automovil $automovile): self
    {
        if (!$this->automoviles->contains($automovile)) {
            $this->automoviles[] = $automovile;
            $automovile->setCombustible($this);
        }

        return $this;
    }

    public function removeAutomovile(Automovil $automovile): self
    {
        if ($this->automoviles->contains($automovile)) {
            $this->automoviles->removeElement($automovile);
            // set the owning side to null (unless already changed)
            if ($automovile->getCombustible() === $this) {
                $automovile->setCombustible(null);
            }
        }

        return $this;
    }
}
